<?php

namespace App\Filament\Resources\Reclamations\Tables;

use App\Enums\ClaimStatusEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Table;

class ReclamationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->label(__("Nom et prénom"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('client_number')
                    ->label(__("Numéro de client"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label(__("Téléphone"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                    ->label(__("Sujet"))
                    ->searchable(),

                Tables\Columns\SelectColumn::make('status')
                    ->options(ClaimStatusEnum::class)
                    ->label(__("Etat"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("Créé à"))
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
