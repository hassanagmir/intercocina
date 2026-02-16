<?php

namespace App\Filament\Resources\Orders\Tables;

use App\Enums\OrderStatusEnum;
use App\Filament\Exports\OrderExporter;
use App\Models\Order;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportBulkAction;
use Filament\Actions\ViewAction;
use Filament\Support\Enums\IconSize;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        
        return $table
            ->columns([
             TextColumn::make('user')
                    ->state(function (Model $model) {
                        if ($model->user->code || $model->user->name) {
                            return ucwords($model->user->name . $model->user->code ?  " (". $model->user->code . ")" : "");
                        }elseif ($model->user->full_name) {
                            return ucwords($model->user->full_name);
                        }
                        return $model->user->email;
                    })
                    ->placeholder("__")
                    ->label(__("Client"))
                    ->numeric()
                    ->sortable(),

             TextColumn::make('items_count')->counts('items')
                    ->badge()
                    ->label(__("Produits")),

             TextColumn::make('total_amount')
                    ->badge()
                    ->suffix(" MAD")
                    ->label(__("Montant total"))
                    ->numeric()
                    ->sortable(),

             SelectColumn::make('status')
                    ->placeholder("__")
                    ->label(__("Modifier l'état"))
                    ->options(OrderStatusEnum::class),

             TextColumn::make('view_status')
                    ->state(function (Model $model) {
                        return $model->status;
                    })
                    ->placeholder("État")
                    ->label(__("État")),


             TextColumn::make('created_at')
                    ->label(__("Crée le"))
                    ->since()
                    ->sortable(),

               

             TextColumn::make('created_at')
                    ->state(function (Model $model) {
                        return $model->created_at->format('d/m/Y - h:m A');
                    })
                    ->label(__("Crée le")),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('export')
                    ->url(fn (Order $record): string => route('order.export', $record->id))
                    ->iconSize(IconSize::Medium)
                    ->icon('heroicon-m-arrow-up-tray')
                    ->label(false)
                    ->tooltip(__("Export")),
                ViewAction::make()
                    ->iconSize(IconSize::Medium)
                    ->label(false)
                    ->tooltip(__("Voir")),
                EditAction::make()
                    ->iconSize(IconSize::Medium)
                    ->label(false)
                    ->tooltip(__("Editer")),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    // ->icon('heroicons-o-trash'),
                    ExportBulkAction::make()
                        ->exporter(OrderExporter::class)
                ]),
            ]);
    }
}
