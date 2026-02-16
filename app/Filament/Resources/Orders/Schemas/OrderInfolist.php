<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('code'),
                TextEntry::make('total_amount')
                    ->numeric(),
                TextEntry::make('status')
                    ->badge()
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('address_id')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('payment')
                    ->badge()
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('shipping_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('type')
                    ->placeholder('-'),
            ]);
    }
}
