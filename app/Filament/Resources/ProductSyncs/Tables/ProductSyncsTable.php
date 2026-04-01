<?php

namespace App\Filament\Resources\ProductSyncs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductSyncsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('started_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('finished_at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('total_products')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_count')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('updated_count')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('unchanged_count')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('failed_count')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('price_updates')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('stock_updates')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
