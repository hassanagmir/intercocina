<?php

namespace App\Filament\Resources\Types\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TypesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->reorderable('order')
            ->defaultSort(function (Builder $query): Builder {
                return $query->orderBy('order');
            })
            ->columns([
                ImageColumn::make('image')
                    ->label(__('Image')),
                TextColumn::make('name')
                    ->label(__('Type'))
                    ->searchable(),
                TextColumn::make('products_count')
                    ->counts('products')
                    ->label(__('Produit'))
                    ->sortable(),
                IconColumn::make('status')
                    ->label(__('Statut'))
                    ->boolean(),
                TextColumn::make('category.name')
                    ->badge()

                    ->label(__('Catégorie'))
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label(__('Créé le'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('Modifié le'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
