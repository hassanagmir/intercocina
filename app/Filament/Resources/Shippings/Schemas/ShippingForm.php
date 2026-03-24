<?php

namespace App\Filament\Resources\Shippings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ShippingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('logo')
                    ->label('')
                    ->columnSpanFull()
                    ->alignCenter()
                    ->avatar(),
                TextInput::make('name')
                    ->label(__("Nom"))
                    ->columnSpanFull()
                    ->required(),
            ]);
    }
}
