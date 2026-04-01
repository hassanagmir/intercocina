<?php

namespace App\Http\Controllers;

use App\Models\Dimension;
use App\Models\Product;
use App\Models\ProductSync;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class ProductSyncController extends Controller
{
    protected string $baseApiUrl = 'https://online.intercocina.space/api/article/';

    public function syncByCode(string $code): JsonResponse
    {
        $sync = ProductSync::create([
            'started_at'     => now(),
            'status'         => 'running',
            'total_products' => 1,
        ]);

        try {
            $response = Http::timeout(15)->get($this->baseApiUrl . $code);

            if (!$response->successful()) {
                return $this->failSync($sync, "API returned status {$response->status()} for code [{$code}].");
            }

            $data = $response->json();

            if (empty($data['AR_Ref'])) {
                return $this->failSync($sync, "Invalid API response: missing AR_Ref.");
            }

            [$meta, $action] = $this->syncPriceAndStock($data);

            $sync->update([
                'finished_at'     => now(),
                'status'          => 'completed',
                'updated_count'   => $action === 'updated'   ? 1 : 0,
                'unchanged_count' => $action === 'unchanged' ? 1 : 0,
                'failed_count'    => $action === 'not_found' ? 1 : 0,
                'price_updates'   => $meta['price_changed']  ? 1 : 0,
                'stock_updates'   => $meta['stock_changed']  ? 1 : 0,
                'message'         => $meta['message'],
            ]);

            return response()->json([
                'success'   => true,
                'action'    => $action,
                'sync_id'   => $sync->id,
                'details'   => $meta,
            ]);
        } catch (Throwable $e) {
            Log::error("ProductSync error for [{$code}]: " . $e->getMessage());
            return $this->failSync($sync, $e->getMessage());
        }
    }

    private function syncPriceAndStock(array $data): array
    {
        $code  = $data['AR_Ref'];
        $price = (float) ($data['AR_PrixVen'] ?? 0);
        $stock = (int)   ($data['stock']      ?? 0);

        // --- Sync Product ---
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
            $product->update([
                'price' => $price,
                'stock' => $stock,
            ]);
        }

        // --- Sync Dimension (by product_id + code) ---
        $dimension = Dimension::where('product_id', $product->id)
            ->where('code', $code)
            ->first();

        if ($dimension) {
            $dimPriceChanged = (float) $dimension->price !== $price;
            $dimStockChanged = (int)   $dimension->stock !== $stock;

            if ($dimPriceChanged || $dimStockChanged) {
                $dimension->update([
                    'price' => $price,
                    'stock' => $stock,
                ]);
            }
        }

        $action = ($priceChanged || $stockChanged) ? 'updated' : 'unchanged';

        return [
            [
                'price_changed'  => $priceChanged,
                'stock_changed'  => $stockChanged,
                'product_id'     => $product->id,
                'dimension_id'   => $dimension?->id,
                'message'        => "Product [{$code}] {$action}.",
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


    public function syncAll(): JsonResponse
    {
        $sync = ProductSync::create([
            'started_at'     => now(),
            'status'         => 'running',
            'total_products' => 0,
        ]);

        try {
            $products   = Product::whereNotNull('code')->get();
            $dimensions = Dimension::whereNotNull('code')->get();

            $sync->update([
                'total_products' => $products->count() + $dimensions->count(),
            ]);

            $totalPriceUpdates = 0;
            $totalStockUpdates = 0;
            $updatedCount      = 0;
            $unchangedCount    = 0;
            $failedCount       = 0;

            // --- Loop Products ---
            foreach ($products as $product) {
                try {
                    $response = Http::timeout(15)->get($this->baseApiUrl . $product->code);

                    if (!$response->successful()) {
                        $failedCount++;
                        continue;
                    }

                    $data = $response->json();

                    if (empty($data['AR_Ref'])) {
                        $failedCount++;
                        continue;
                    }

                    $price = (float) ($data['AR_PrixVen'] ?? 0);
                    $stock = (int)   ($data['stock']      ?? 0);

                    $priceChanged = (float) $product->price !== $price;
                    $stockChanged = (int)   $product->stock !== $stock;

                    if ($priceChanged || $stockChanged) {
                        $product->update([
                            'price' => $price,
                            'stock' => $stock,
                        ]);
                        $updatedCount++;
                    } else {
                        $unchangedCount++;
                    }

                    if ($priceChanged) $totalPriceUpdates++;
                    if ($stockChanged) $totalStockUpdates++;
                } catch (Throwable $e) {
                    Log::error("Sync failed for product [{$product->code}]: " . $e->getMessage());
                    $failedCount++;
                }
            }

            // --- Loop Dimensions ---
            foreach ($dimensions as $dimension) {
                try {
                    $response = Http::timeout(15)->get($this->baseApiUrl . $dimension->code);

                    if (!$response->successful()) {
                        $failedCount++;
                        continue;
                    }

                    $data = $response->json();

                    if (empty($data['AR_Ref'])) {
                        $failedCount++;
                        continue;
                    }

                    $price = (float) ($data['AR_PrixVen'] ?? 0);
                    $stock = (int)   ($data['stock']      ?? 0);

                    $dimPriceChanged = (float) $dimension->price !== $price;
                    $dimStockChanged = (int)   $dimension->stock !== $stock;

                    if ($dimPriceChanged || $dimStockChanged) {
                        $dimension->update([
                            'price' => $price,
                            'stock' => $stock,
                        ]);
                        $updatedCount++;
                    } else {
                        $unchangedCount++;
                    }

                    if ($dimPriceChanged) $totalPriceUpdates++;
                    if ($dimStockChanged) $totalStockUpdates++;
                } catch (Throwable $e) {
                    Log::error("Sync failed for dimension [{$dimension->code}]: " . $e->getMessage());
                    $failedCount++;
                }
            }

            $sync->update([
                'finished_at'     => now(),
                'status'          => 'completed',
                'updated_count'   => $updatedCount,
                'unchanged_count' => $unchangedCount,
                'failed_count'    => $failedCount,
                'price_updates'   => $totalPriceUpdates,
                'stock_updates'   => $totalStockUpdates,
                'message'         => "Sync completed: {$updatedCount} updated, {$unchangedCount} unchanged, {$failedCount} failed.",
            ]);

            return response()->json([
                'success'         => true,
                'sync_id'         => $sync->id,
                'total'           => $products->count() + $dimensions->count(),
                'updated_count'   => $updatedCount,
                'unchanged_count' => $unchangedCount,
                'failed_count'    => $failedCount,
                'price_updates'   => $totalPriceUpdates,
                'stock_updates'   => $totalStockUpdates,
            ]);
        } catch (Throwable $e) {
            Log::error("SyncAll fatal error: " . $e->getMessage());
            return $this->failSync($sync, $e->getMessage());
        }
    }
}
