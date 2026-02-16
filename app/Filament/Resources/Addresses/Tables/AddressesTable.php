<?php

namespace App\Filament\Resources\Addresses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class AddressesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user')
                    ->state(function (Model $model) {
                        return $model->user->first_name . " " . $model->user->last_name;
                    })
                    ->label(__("Utilisateur"))
                    ->sortable(),
                TextColumn::make('address_name')
                    ->label(__("Adresse"))
                    ->searchable(),

                TextColumn::make('phone')
                    ->label(__("Téléphone"))
                    ->searchable(),
                TextColumn::make('city.name')
                    ->label(__("Ville"))
                    ->sortable(),
                TextColumn::make('email')
                    ->label(__("E-mail"))
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label(__("Cree le"))
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
