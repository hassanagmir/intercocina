<?php

namespace App\Filament\Widgets;

use App\Enums\OrderStatusEnum;
use App\Models\Order;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class OrderTable extends BaseWidget
{

    protected static ?int $sort = 7;

    protected int | string | array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return Order::query()->where('status', OrderStatusEnum::ON_HOLD)->latest();
    }

    protected function getTableHeading(): string
    {
        return __("Dernières commandes");
    }

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getTableQuery())
            ->columns([
                Tables\Columns\TextColumn::make('user')
                    ->state(function (Model $model) {
                        return $model->user->first_name . " " . $model->user->last_name;
                    })
                    ->label(__("Client"))
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('items_count')->counts('items')
                    ->badge()
                    ->label(__("Produits"))
                    ->searchable(),

                Tables\Columns\TextColumn::make('total_amount')
                    ->badge()
                    ->suffix(" MAD")
                    ->label(__("Montant total"))
                    ->numeric()
                    ->sortable(),

                Tables\Columns\SelectColumn::make('status')
                    ->placeholder("__")
                    ->label(__("Modifier l'état"))
                    ->options(OrderStatusEnum::class),

                Tables\Columns\TextColumn::make('view_status')
                    ->state(function (Model $model) {
                        return $model->status;
                    })
                    ->placeholder("État")
                    ->label(__("État")),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->label(__("Crée le"))
                //     ->since()
                //     ->date('d m y')
                //     ->sortable(),



                Tables\Columns\TextColumn::make('created_at')
                    ->state(function (Model $model) {
                        return $model->created_at->format('d/m/Y - h:m A');
                    })
                    ->label(__("Crée le")),
            ]);
    }
}
