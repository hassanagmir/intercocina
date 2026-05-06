<?php

namespace App\Filament\Widgets;

use App\Enums\OrderStatusEnum;
use App\Models\Order;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class OrderTable extends TableWidget
{

    protected static ?int $sort = 7;

    protected int|string|array $columnSpan = 'full';


    public function table(Table $table): Table
    {

        return $table
            ->heading(__('Dernières commandes'))
            

            ->query(
                Order::query()
                    ->where('status', OrderStatusEnum::ON_HOLD)
                    ->latest()
            )
            ->columns([
                Tables\Columns\TextColumn::make('user.full_name')
                    ->getStateUsing(
                        fn(Model $record): string =>
                        $record->user->first_name . ' ' . $record->user->last_name
                    )
                    ->label(__('Client'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('items_count')
                    ->counts('items')
                    ->badge()
                    ->label(__('Produits')),

                Tables\Columns\TextColumn::make('total_amount')
                    ->badge()
                    ->suffix(' MAD')
                    ->label(__('Montant total'))
                    ->numeric()
                    ->sortable(),

                Tables\Columns\SelectColumn::make('status')
                    ->placeholder('__')
                    ->label(__("Modifier l'état"))
                    ->options(OrderStatusEnum::class),

                Tables\Columns\TextColumn::make('status_display')
                    ->getStateUsing(fn(Model $record): mixed => $record->status)
                    ->label(__('État')),

                Tables\Columns\TextColumn::make('created_at')
                    ->getStateUsing(
                        fn(Model $record): string =>
                        $record->created_at->format('d/m/Y - h:i A')
                    )
                    ->label(__('Crée le')),
            ]);
    }
}
