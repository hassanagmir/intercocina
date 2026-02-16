<?php

namespace App\Filament\Resources\Colors\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;

class ColorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->circular()
                    ->label(__("Image")),
                Tables\Columns\TextColumn::make('name')
                    ->label(__("Couleur"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('code')
                    ->placeholder("__")
                    ->label(__("Numero"))
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->label(__("Status"))
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("Crée le"))
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
