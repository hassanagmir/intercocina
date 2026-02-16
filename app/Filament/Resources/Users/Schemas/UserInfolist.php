<?php

namespace App\Filament\Resources\Users\Schemas;


use Filament\Infolists;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
               Section::make()
                    ->schema([
                        Infolists\Components\TextEntry::make('code')
                            ->placeholder('__')
                            ->label(__("Numéro")),

                        Infolists\Components\TextEntry::make('name')
                            ->placeholder("__")
                            ->label(__("Entreprise")),

                        Infolists\Components\TextEntry::make('full_name')
                            ->label(__("Nom complet")),


                        Infolists\Components\TextEntry::make('phone')
                            ->placeholder("__")
                            ->label(__("Téléphone")),


                        Infolists\Components\TextEntry::make('email')
                            ->placeholder('__')
                            ->label(__("E-mail")),
                        Infolists\Components\TextEntry::make('status')
                            ->formatStateUsing(fn($state) => $state->name)
                            ->placeholder('__')
                            ->badge()
                            ->label(__("Etat")),

                        Infolists\Components\TextEntry::make('gender')
                            ->placeholder('__')
                            ->badge()
                            ->label(__("Genre"))
                    ])->columnSpanFull()
                    ->columns(3),


                Grid::make()
                    ->columns(1)
                    ->schema([
                        Infolists\Components\RepeatableEntry::make('addresses')
                            ->label(__("Les adresses"))
                            ->schema([
                                Infolists\Components\TextEntry::make('address_name')
                                    ->icon('heroicon-m-map-pin')
                                    ->label(__("Adresse")),
                                Infolists\Components\TextEntry::make('phone')
                                    ->icon('heroicon-m-phone')
                                    ->label(__("Téléphone")),
                                Infolists\Components\TextEntry::make('email')
                                    ->icon('heroicon-m-envelope')
                                    ->label(__("E-mail")),
                                Infolists\Components\TextEntry::make('city.name')
                                    ->icon('heroicon-m-building-office-2')
                                    ->label(__("Ville")),
                            ])
                            ->columns(4)
                            ->columnSpan(1)
                    ])->columnSpanFull()

            ]);
    }
}
