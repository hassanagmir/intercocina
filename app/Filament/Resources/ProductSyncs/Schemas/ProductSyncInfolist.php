<?php

namespace App\Filament\Resources\ProductSyncs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProductSyncInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('started_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('finished_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('total_products')
                    ->numeric(),
                TextEntry::make('created_count')
                    ->numeric(),
                TextEntry::make('updated_count')
                    ->numeric(),
                TextEntry::make('unchanged_count')
                    ->numeric(),
                TextEntry::make('failed_count')
                    ->numeric(),
                TextEntry::make('price_updates')
                    ->numeric(),
                TextEntry::make('stock_updates')
                    ->numeric(),
                TextEntry::make('status'),
                TextEntry::make('message')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
