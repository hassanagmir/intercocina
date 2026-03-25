<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label(__("Titre"))
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\Textarea::make('description')
                                    ->columnSpanFull(),
                                Forms\Components\RichEditor::make('content')
                                    ->label(__("Contenu"))
                                    ->columnSpanFull(),

                            ])
                            ->columnSpan(2),
                        Section::make()
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->image(),

                                 TextInput::make('slug')
                                    ->label('URL')
                                    ->readOnly()
                                    ->copyable()
                                    ->afterStateHydrated(function ($component, $state) {
                                        $component->state('https://intercocina.com/pages/' . $state);
                                    }),
                                Forms\Components\TagsInput::make('tags')
                                    ->label(__("Mots clés"))
                                    ->placeholder(__("Mot-clé"))
                                    ->separator(',')
                                    ->splitKeys(['Tab', ','])
                                    ->default(null),
                            ])->columnSpan(1),
                    ])->columnSpanFull()
            ]);
    }
}
