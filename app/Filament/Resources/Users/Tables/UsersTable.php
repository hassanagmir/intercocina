<?php

namespace App\Filament\Resources\Users\Tables;

use App\Enums\UserStatusEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
              Tables\Columns\TextColumn::make('code')
                    ->placeholder("__")
                    ->searchable()
                    ->label(__("Numéro")),
                Tables\Columns\TextColumn::make('name')
                    ->label(__("Entreprise"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->placeholder("__")
                    ->label(__("E-mail"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('first_name')
                    ->placeholder("__")
                    ->label(__("Prénom"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->label(__("Nom"))
                    ->placeholder("__")
                    ->searchable(),
                Tables\Columns\TextColumn::make('city.name')
                    ->placeholder("__")
                    ->label(__("Ville"))
                    ->searchable(),
                Tables\Columns\SelectColumn::make('status')
                    ->placeholder("__")
                    ->label(__("État"))
                    ->options(UserStatusEnum::toArray()),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("Date d'inscription"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__("Date de modification"))
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
