<?php

namespace App\Filament\Resources\Dimensions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DimensionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([


                TextColumn::make('code')
                    ->label('Référence')
                    ->searchable(),

                TextColumn::make('product.name')
                    ->label('Produit')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('dimension')
                    ->label('Dimension')
                    ->searchable(),


                TextColumn::make('color.name')
                    ->label('Couleur')
                    ->searchable(),


                TextColumn::make('width')
                    ->label('Largeur')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('height')
                    ->label('Hauteur')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('price')
                    ->label('Prix')
                    ->money('MAD')
                    ->sortable(),
                IconColumn::make('status')
                    ->label('Statut')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Mis à jour le')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Modifier'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Supprimer'),
                ]),
            ]);
    }
}
