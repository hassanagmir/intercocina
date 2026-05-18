<?php

namespace App\Filament\Resources\Products\Actions;

use App\Imports\ArticleStockImport;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ImportStockAction
{
    public static function make(): Action
    {
        return Action::make('Importer')
            ->icon('heroicon-o-arrow-up-tray')
            ->modalHeading('Importer le stock Excel')
            ->modalDescription('Importez le fichier .xlsx exporté depuis le système de gestion de stock.')
            ->modalWidth('2xl')
            ->schema([
                FileUpload::make('file')
                    ->label('Fichier Excel (.xlsx)')
                    ->acceptedFileTypes([
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    ])
                    ->maxSize(10240)
                    ->required()
                    ->disk('local')
                    ->directory('imports/stock')
                    ->storeFiles(),
            ])
            ->modalSubmitActionLabel('Lancer l\'import')
            ->action(function (array $data) {
                $relativePath = is_array($data['file']) ? $data['file'][0] : $data['file'];
                $path = \Illuminate\Support\Facades\Storage::disk('local')->path($relativePath);

                if (! file_exists($path)) {
                    Notification::make()
                        ->title('Fichier introuvable')
                        ->body($path)
                        ->danger()
                        ->send();
                    return;
                }

                $importer = new ArticleStockImport();

                try {
                    Excel::import($importer, $path);
                } catch (\Throwable $e) {
                    \Illuminate\Support\Facades\Log::error('Import exception: ' . $e->getMessage());

                    if ($importer->sync) {
                        $importer->sync->update([
                            'status'      => 'failed',
                            'finished_at' => now(),
                            'message'     => $e->getMessage(),
                        ]);
                    }

                    Notification::make()
                        ->title('Erreur lors de l\'import')
                        ->body($e->getMessage())
                        ->danger()
                        ->send();
                    return;
                }

                // sync is null means collection() never ran (empty file or wrong format)
                if (! $importer->sync) {
                    Notification::make()
                        ->title('Import échoué')
                        ->body('Le fichier semble vide ou dans un format non reconnu.')
                        ->danger()
                        ->send();
                    return;
                }

                $sync     = $importer->sync;
                $notFound = $importer->notFound;

                Notification::make()
                    ->title('Import terminé')
                    ->body(implode(' · ', array_filter([
                        "{$sync->total_products} lignes traitées",
                        "{$sync->updated_count} mis à jour",
                        "{$sync->unchanged_count} inchangés",
                        $sync->failed_count  ? "{$sync->failed_count} échoués"    : null,
                        $sync->price_updates ? "{$sync->price_updates} prix màj"  : null,
                        $sync->stock_updates ? "{$sync->stock_updates} stocks màj" : null,
                    ])))
                    ->success()
                    ->persistent()
                    ->send();

                if (count($notFound) > 0) {
                    $list = collect($notFound)
                        ->take(10)
                        ->map(fn($r) => "• {$r['code']} — {$r['nom']}")
                        ->join("\n");

                    $extra = count($notFound) > 10
                        ? "\n… et " . (count($notFound) - 10) . " autres"
                        : '';

                    Notification::make()
                        ->title(count($notFound) . ' article(s) introuvable(s)')
                        ->body($list . $extra)
                        ->warning()
                        ->persistent()
                        ->send();
                }

                Storage::disk('local')->delete($relativePath);
            });
    }
}
