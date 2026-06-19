<?php

namespace App\Filament\Resources\Reviews\Schemas;

use App\Filament\Resources\Products\ProductResource;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ReviewInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('full_name')
                    ->label('Nom complet'),
                TextEntry::make('email')
                    ->label('Adresse e-mail'),
                TextEntry::make('stars')
                    ->label('Étoiles')
                    ->numeric(),
                TextEntry::make('product.name')
                    ->label('Produit')
                    ->url(fn ($record) => $record->product
                        ? ProductResource::getUrl('edit', ['record' => $record->product])
                        : null)
                    ->openUrlInNewTab(),
                IconEntry::make('status')
                    ->label('Statut')
                    ->boolean(),
                TextEntry::make('comment')
                    ->label('Commentaire')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->label('Créé le')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->label('Mis à jour le')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}