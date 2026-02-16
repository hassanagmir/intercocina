<?php

namespace App\Filament\Resources\Products\Tables;

use App\Enums\ProductStatusEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProductsTable
{

  public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label("Produits")
                    ->searchable(),

                TextColumn::make('type.name')
                    ->label(__("Type"))
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                
                TextColumn::make('code')
                    ->label(__("Référence"))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('dimensions_count')->counts('dimensions')
                    ->label(__("Dimensions"))
                    ->numeric(),
                SelectColumn::make('status')
                    ->options(ProductStatusEnum::toArray())
                    ->placeholder("__")
                    ->label("Etat"),

                TextColumn::make('created_at')
                    ->label(__("Date de création"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label(__("Date de modification"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->reorderable('order')
            ->filters([
                SelectFilter::make('type')
                    ->searchable()
                    ->multiple()
                    ->preload()
                    ->relationship('type', 'name')
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
