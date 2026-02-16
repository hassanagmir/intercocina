<?php

namespace App\Filament\Resources\Covers\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CoverForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Grid::make(3)
                    ->schema([
                        Section::make()
                            ->schema([

                                TextInput::make('title')
                                    ->label('Titre')
                                    ->required(),

                                TextInput::make('subtitle')
                                    ->label('Sous-titre'),

                                TextInput::make('url')
                                    ->label('URL')
                                    ->url(),

                                Textarea::make('description')
                                    ->label(__("Description"))
                                    ->columnSpanFull(),
                                Select::make('color_id')
                                    ->relationship('colors', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->multiple()
                                    ->label(__('Couleur laca')),

                                Select::make('view_color_id')
                                    ->relationship('color_views', 'name')
                                    ->preload()
                                    ->searchable()
                                    ->multiple()
                                    ->label(__('Couleur Intermat')),

                            ])
                            ->columnSpan(2),

                        Section::make()
                            ->schema([

                                FileUpload::make('image')
                                    ->label('Image')
                                    ->image()
                                    ->required(),

                                TextInput::make('price')
                                    ->label('Prix')
                                    ->numeric()
                                    ->prefix('MAD'),

                                TextInput::make('old_price')
                                    ->label('Ancien prix')
                                    ->numeric()
                                    ->prefix('MAD'),

                                Toggle::make('top')
                                    ->label('Afficher en haut')
                                    ->required(),

                                Toggle::make('bottom')
                                    ->label('Afficher en bas')
                                    ->required(),

                                Toggle::make('is_new')
                                    ->label('Nouveau')
                                    ->required(),

                                Toggle::make('is_main')
                                    ->label('Principal')
                                    ->required(),

                                Toggle::make('is_public')
                                    ->label('Public')
                                    ->required(),
                            ])
                            ->columnSpan(1)

                    ])
                    ->columnSpanFull(),

            ]);
    }
}
