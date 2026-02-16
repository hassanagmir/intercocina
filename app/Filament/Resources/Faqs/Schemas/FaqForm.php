<?php

namespace App\Filament\Resources\Faqs\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class FaqForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('question')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('answer')
                                    ->label(__("Répondre"))
                                    ->required()
                                    ->columnSpanFull(),

                            ])->columnSpanFull()

                    ])->columnSpanFull()
            ]);
    }
}
