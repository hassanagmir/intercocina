<?php

namespace App\Http\Controllers;

use App\Models\Dimension;
use App\Models\Product;
use App\Models\ProductSync;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class ProductSyncController extends Controller
{
    protected string $baseApiUrl;

    public function __construct()
    {
        $this->baseApiUrl = rtrim((string) config('services.logilink.article_url'), '/') . '/';
    }

    public function syncByCode(string $code): JsonResponse
    {
        $sync = ProductSync::create([
            'started_at'     => now(),
            'status'         => 'running',
            'total_products' => 1,
        ]);

        try {
            $response = Http::timeout(15)->get($this->baseApiUrl . rawurlencode($code));

            if (!$response->successful()) {
                return $this->failSync($sync, "API returned status {$response->status()} for code [{$code}].");
            }

            $data = $response->json();

            if (empty($data['AR_Ref'])) {
                return $this->failSync($sync, 'Invalid API response: missing AR_Ref.');
            }

            [$meta, $action] = $this->syncPriceAndStock($data);

            $sync->update([
                'finished_at'     => now(),
                'status'          => 'completed',
                'updated_count'   => $action === 'updated'   ? 1 : 0,
                'unchanged_count' => $action === 'unchanged' ? 1 : 0,
                'failed_count'    => $action === 'not_found' ? 1 : 0,
                'price_updates'   => $meta['price_changed'] ? 1 : 0,
                'stock_updates'   => $meta['stock_changed'] ? 1 : 0,
                'message'         => $meta['message'],
            ]);

            return response()->json([
                'success' => true,
                'action'  => $action,
                'sync_id' => $sync->id,
                'details' => $meta,
            ]);
        } catch (Throwable $e) {
            Log::error("ProductSync error for [{$code}]: " . $e->getMessage());
            return $this->failSync($sync, $e->getMessage());
        }
    }

    public function syncAll(): JsonResponse
    {
        set_time_limit(0);

        $sync = ProductSync::create([
            'started_at'     => now(),
            'status'         => 'running',
            'total_products' => 0,
        ]);

        try {
            $total = Product::whereNotNull('code')->count()
                   + Dimension::whereNotNull('code')->count();

            $sync->update(['total_products' => $total]);

            $stats = [
                'updated'   => 0,
                'unchanged' => 0,
                'failed'    => 0,
                'price'     => 0,
                'stock'     => 0,
            ];

            // Chunked + only the needed columns: constant memory usage
            foreach ([Product::class, Dimension::class] as $modelClass) {
                $modelClass::query()
                    ->whereNotNull('code')
                    ->select('id', 'code', 'price', 'stock')
                    ->chunkById(200, function ($rows) use (&$stats) {
                        foreach ($rows as $row) {
                            $this->syncRow($row, $stats);
                        }
                    });
            }

            $sync->update([
                'finished_at'     => now(),
                'status'          => 'completed',
                'updated_count'   => $stats['updated'],
                'unchanged_count' => $stats['unchanged'],
                'failed_count'    => $stats['failed'],
                'price_updates'   => $stats['price'],
                'stock_updates'   => $stats['stock'],
                'message'         => "Sync completed: {$stats['updated']} updated, {$stats['unchanged']} unchanged, {$stats['failed']} failed.",
            ]);

            return response()->json([
                'success'         => true,
                'sync_id'         => $sync->id,
                'total'           => $total,
                'updated_count'   => $stats['updated'],
                'unchanged_count' => $stats['unchanged'],
                'failed_count'    => $stats['failed'],
                'price_updates'   => $stats['price'],
                'stock_updates'   => $stats['stock'],
            ]);
        } catch (Throwable $e) {
            Log::error('SyncAll fatal error: ' . $e->getMessage());
            return $this->failSync($sync, $e->getMessage());
        }
    }

    /* ------------------------------------------------------------------ */

    private function fetchArticle(string $code): ?array
    {
        $response = Http::timeout(15)->get($this->baseApiUrl . rawurlencode($code));

        if (!$response->successful()) {
            return null;
        }

        $data = $response->json();

        return empty($data['AR_Ref']) ? null : $data;
    }

    /** Syncs one Product or Dimension row and updates the stats counters. */
    private function syncRow(Model $row, array &$stats): void
    {
        try {
            $data = $this->fetchArticle($row->code);

            if (!$data) {
                $stats['failed']++;
                return;
            }

            $price = (float) ($data['AR_PrixVen'] ?? 0);
            $stock = (int)   ($data['stock']      ?? 0);

            $priceChanged = (float) $row->price !== $price;
            $stockChanged = (int)   $row->stock !== $stock;

            if ($priceChanged || $stockChanged) {
                $row->update(['price' => $price, 'stock' => $stock]);
                $stats['updated']++;
            } else {
                $stats['unchanged']++;
            }

            if ($priceChanged) $stats['price']++;
            if ($stockChanged) $stats['stock']++;
        } catch (Throwable $e) {
            Log::error('Sync failed for [' . class_basename($row) . " {$row->code}]: " . $e->getMessage());
            $stats['failed']++;
        }
    }

    private function syncPriceAndStock(array $data): array
    {
        $code  = $data['AR_Ref'];
        $price = (float) ($data['AR_PrixVen'] ?? 0);
        $stock = (int)   ($data['stock']      ?? 0);

        $product = Product::where('code', $code)->first();

        if (!$product) {
            return [
                [
                    'price_changed' => false,
                    'stock_changed' => false,
                    'message'       => "Product [{$code}] not found — skipped.",
                ],
                'not_found',
            ];
        }

        $priceChanged = (float) $product->price !== $price;
        $stockChanged = (int)   $product->stock !== $stock;

        if ($priceChanged || $stockChanged) {
            $product->update(['price' => $price, 'stock' => $stock]);
        }

        $dimension = Dimension::where('product_id', $product->id)
            ->where('code', $code)
            ->first();

        if ($dimension) {
            $dimPriceChanged = (float) $dimension->price !== $price;
            $dimStockChanged = (int)   $dimension->stock !== $stock;

            if ($dimPriceChanged || $dimStockChanged) {
                $dimension->update(['price' => $price, 'stock' => $stock]);
            }
        }

        $action = ($priceChanged || $stockChanged) ? 'updated' : 'unchanged';

        return [
            [
                'price_changed' => $priceChanged,
                'stock_changed' => $stockChanged,
                'product_id'    => $product->id,
                'dimension_id'  => $dimension?->id,
                'message'       => "Product [{$code}] {$action}.",
            ],
            $action,
        ];
    }

    private function failSync(ProductSync $sync, string $message): JsonResponse
    {
        $sync->update([
            'finished_at'  => now(),
            'status'       => 'failed',
            'failed_count' => 1,
            'message'      => $message,
        ]);

        return response()->json(['success' => false, 'message' => $message], 422);
    }
}