<?php

namespace App\Filament\Resources\Reclamations\Schemas;

use Filament\Infolists;
use Filament\Schemas\Schema;

class ReclamationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Infolists\Components\TextEntry::make('full_name')
                    ->label(__("Nom et prénom")),
                Infolists\Components\TextEntry::make('client_number')
                    ->badge()
                    ->label(__("Numéro de client")),
                Infolists\Components\TextEntry::make('phone')
                    ->label(__("Téléphone")),
                Infolists\Components\TextEntry::make('subject')
                    ->label(__("Sujet")),
                Infolists\Components\TextEntry::make('message')
                    ->columnSpanFull()
                    ->label(__("Message")),
            ]);
    }
}
