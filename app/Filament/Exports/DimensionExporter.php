<?php

namespace App\Filament\Exports;

use App\Models\Dimension;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class DimensionExporter extends Exporter
{
    protected static ?string $model = Dimension::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('code')
                ->label(__("Référence")),

            ExportColumn::make('product_name')
                ->state(function(Dimension $dimension){
                    return $dimension?->attribute?->name . " " . $dimension->product->name;
                })
                ->label(__("Produit")),

            ExportColumn::make('height')
                ->label(__("Hauteur")),

            ExportColumn::make('width')
                ->label(__("Largeur")),
           
            ExportColumn::make('price')
                ->label(__("Prix")),


            ExportColumn::make('dimension')
                ->label(__("Dimension")),

            ExportColumn::make('color.name')
                ->label(__("Couleur")),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'L\'exportation de vos dimensions est terminée et ' . number_format($export->successful_rows) . ' ' . str('ligne')->plural($export->successful_rows) . ' ont été exportées.';
    
        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('ligne')->plural($failedRowsCount) . ' n\'ont pas pu être exportées.';
        }
    
        return $body;
    }
    
}
