<?php

namespace App\Filament\Resources\ViewImages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ViewImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('path')
                    ->required(),
                TextInput::make('string'),
                TextInput::make('view_color_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
