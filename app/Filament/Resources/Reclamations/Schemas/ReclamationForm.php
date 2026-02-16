<?php

namespace App\Filament\Resources\Reclamations\Schemas;

use App\Enums\ClaimStatusEnum;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ReclamationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

            Forms\Components\TextInput::make('client_number')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('full_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subject')
                    ->required()
                    ->maxLength(255),

                 Forms\Components\Select::make('status')
                    ->options(ClaimStatusEnum::class)
                    ->default(1)
                    ->required(),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Textarea::make('message')
                    ->required()
                    ->columnSpanFull()
            ]);
    }
}
