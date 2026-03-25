<?php

namespace App\Filament\Resources\Collections\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CollectionForm
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
                                    ->label('Titre'),
                                Textarea::make('description')
                                    ->label('Description')
                                    ->required()
                                    ->columnSpanFull(),

                                Select::make('products')
                                    ->multiple()
                                    ->preload()
                                    ->relationship('products', 'name'),
                                RichEditor::make('content')
                                    ->label('Contenu')
                                    ->required()
                                    ->columnSpanFull(),
                            ])->columnSpan(2),
                        Section::make()
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Image')
                                    ->image()
                                    ->required(),
                                DatePicker::make('end_date')
                                    ->native(false)
                                    ->label('Date de fin'),
                                Toggle::make('status')
                                    ->label('Statut')
                                    ->required(),

                                TextInput::make('slug')
                                    ->label('URL')
                                    ->readOnly()
                                    ->copyable()
                                    ->afterStateHydrated(function ($component, $state) {
                                        $component->state('https://intercocina.com/collections/' . $state);
                                    })
                            ])->columnSpan(1)
                    ])->columnSpanFull()
            ]);
    }
}
