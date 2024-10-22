<?php

namespace App\Filament\Exports;

use App\Models\Order;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Database\Eloquent\Model;

class OrderExporter extends Exporter
{
    protected static ?string $model = Order::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),

            ExportColumn::make('code')
                ->label(__("Référence")),

            ExportColumn::make('user.full_name')
                ->label(__("Client")),

            ExportColumn::make('total_amount')
                ->label(__("Montant total")),

            ExportColumn::make('status')
                ->label(__("État"))
                ->state(function(Model $model){
                    return $model->status->getLabel();
                }),

            ExportColumn::make('address.city.name')
                ->label(__("Ville")),

            ExportColumn::make('address.address_name')
                ->label(__("Adress")),

            ExportColumn::make('address.phone')
                ->label(__("Téléphone")),
            

            ExportColumn::make('address.email')
                ->label(__("E-mail")),


            ExportColumn::make('created_at')
                ->label(__("Date")),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {

        $body = 'Votre exportation de commande est terminée et ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' lignes ont été exportées.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . " Échec de l'exportation.";
        }

        return $body;
    }
}
