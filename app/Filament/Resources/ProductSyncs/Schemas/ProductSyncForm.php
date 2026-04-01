<?php

namespace App\Filament\Resources\ProductSyncs\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProductSyncForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DateTimePicker::make('started_at'),
                DateTimePicker::make('finished_at'),
                TextInput::make('total_products')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('created_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('updated_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('unchanged_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('failed_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('price_updates')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('stock_updates')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('status')
                    ->required()
                    ->default('running'),
                Textarea::make('message')
                    ->columnSpanFull(),
            ]);
    }
}
