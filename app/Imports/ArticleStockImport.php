<?php

namespace App\Imports;

use App\Models\Dimension;
use App\Models\Product;
use App\Models\ProductSync;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ArticleStockImport implements ToCollection, WithHeadingRow
{
    public ?ProductSync $sync = null;
    public array $notFound    = [];

    public function collection(Collection $rows)
    {
        // ── Dump heading keys on first row for debugging ──────────────────
        // Remove this after confirming keys are correct
        if ($rows->isNotEmpty()) {
            \Illuminate\Support\Facades\Log::info('Excel heading keys:', $rows->first()->keys()->all());
        }

        // ── Create sync record only when collection actually runs ─────────
        $this->sync = ProductSync::create([
            'started_at'      => now(),
            'status'          => 'running',
            'total_products'  => 0,
            'created_count'   => 0,
            'updated_count'   => 0,
            'unchanged_count' => 0,
            'failed_count'    => 0,
            'price_updates'   => 0,
            'stock_updates'   => 0,
        ]);

        $priceUpdates   = 0;
        $stockUpdates   = 0;
        $updatedCount   = 0;
        $unchangedCount = 0;
        $failedCount    = 0;

        // ── Pre-load all codes ────────────────────────────────────────────
        $codes = $rows
            ->map(fn($r) => trim((string) ($r['code'] ?? '')))
            ->filter()
            ->unique()
            ->values()
            ->all();

        \Illuminate\Support\Facades\Log::info('Codes found in Excel:', $codes);

        if (empty($codes)) {
            $this->sync->update([
                'finished_at' => now(),
                'status'      => 'failed',
                'message'     => 'Aucun code trouvé dans le fichier. Vérifiez que la colonne "Code" est bien présente.',
            ]);
            return;
        }

        $products   = Product::whereIn('code', $codes)->get()->keyBy('code');
        $dimensions = Dimension::whereIn('code', $codes)->get()->keyBy('code');

        \Illuminate\Support\Facades\Log::info('Products matched: ' . $products->count());
        \Illuminate\Support\Facades\Log::info('Dimensions matched: ' . $dimensions->count());

        foreach ($rows as $row) {
            $code  = trim((string) ($row['code'] ?? ''));
            $prix  = isset($row['prix_ht']) && $row['prix_ht'] !== '' ? (float) $row['prix_ht'] : null;
            $stock = isset($row['stock'])   && $row['stock']   !== '' ? (float) $row['stock']   : null;

            if (empty($code)) {
                $failedCount++;
                continue;
            }

            $target = null;

            if ($products->has($code)) {
                $target = $products->get($code);
            } elseif ($dimensions->has($code)) {
                $target = $dimensions->get($code);
            }

            if (! $target) {
                $this->notFound[] = [
                    'code'        => $code,
                    'nom'         => $row['nom']         ?? '',
                    'designation' => $row['designation'] ?? '',
                ];
                $failedCount++;
                continue;
            }

            $changed      = false;
            $priceChanged = false;
            $stockChanged = false;

            if ($prix !== null && (float) $target->price !== $prix) {
                $target->price = $prix;
                $priceChanged  = true;
                $changed       = true;
            }

            if ($stock !== null && (float) $target->stock !== $stock) {
                $target->stock = $stock;
                $stockChanged  = true;
                $changed       = true;
            }

            if ($changed) {
                try {
                    $target->save();
                    $updatedCount++;
                    if ($priceChanged) $priceUpdates++;
                    if ($stockChanged) $stockUpdates++;
                } catch (\Throwable $e) {
                    \Illuminate\Support\Facades\Log::error("Save failed for code {$code}: " . $e->getMessage());
                    $failedCount++;
                }
            } else {
                $unchangedCount++;
            }
        }

        $this->sync->update([
            'finished_at'     => now(),
            'status'          => 'completed',
            'total_products'  => $rows->count(),
            'created_count'   => 0,
            'updated_count'   => $updatedCount,
            'unchanged_count' => $unchangedCount,
            'failed_count'    => $failedCount,
            'price_updates'   => $priceUpdates,
            'stock_updates'   => $stockUpdates,
            'message'         => count($this->notFound) > 0
                ? count($this->notFound) . ' article(s) introuvable(s).'
                : null,
        ]);
    }
}