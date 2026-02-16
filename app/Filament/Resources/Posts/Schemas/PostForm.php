<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostForm
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
                                    ->placeholder(__("Titre de l'article"))
                                    ->label(__("Titre"))
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\Select::make('products')
                                    ->multiple()
                                    ->preload()
                                    ->searchable()
                                    ->relationship('products', 'name'),

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
                                Forms\Components\TagsInput::make('tags')
                                    ->label(__("Mots clés"))
                                    ->placeholder(__("Mot-clé"))
                                    ->separator(',')
                                    ->splitKeys(['Tab', ','])
                                    ->default(null),
                            ])->columnSpan(1),
                    ])->columnSpanFull(),

            ]);
    }
}
