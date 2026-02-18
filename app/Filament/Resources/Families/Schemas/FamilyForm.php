<?php

namespace App\Filament\Resources\Families\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class FamilyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image')
                    ->label('Image')
                    ->avatar()
                    ->alignCenter()
                    ->columnSpanFull()
                    ->image(),
                TextInput::make('name')
                    ->label('Nom Famille')
                    ->required(),
                TextInput::make('code')
                    ->label('Code')
                    ->required(),

                Textarea::make('description')
                    ->label('Description')
                    ->columnSpanFull(),
            ]);
    }
}
