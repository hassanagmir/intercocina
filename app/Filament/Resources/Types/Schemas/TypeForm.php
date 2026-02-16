<?php

namespace App\Filament\Resources\Types\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class TypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        Section::make()
                            ->schema([
                                TextInput::make('name')
                                    ->label(__('Type'))
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(
                                        fn($state, callable $set) =>
                                        $set('slug', Str::slug($state))
                                    ),

                                TagsInput::make('tags')
                                    ->label(__('Tags'))
                                    ->separator(','),

                                Textarea::make('description')
                                    ->label(__('Description'))
                                    ->rows(3)
                                    ->maxLength(500)
                                    ->columnSpanFull(),

                                RichEditor::make('content')
                                    ->label(__('Contenu'))
                                    ->columnSpanFull(),
                            ])->columnSpan(2),

                        Section::make()
                            ->columnSpan(1)
                            ->schema([
                                FileUpload::make('image')
                                    ->label(__('Image'))
                                    ->image()
                                    ->maxSize(2048)
                                    ->directory('types'),

                                Select::make('category_id')
                                    ->label(__('Catégorie'))
                                    ->relationship('category', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload(),



                                Toggle::make('status')
                                    ->label(__('Actif'))
                                    ->default(true)
                                    ->inline(false),
                            ])
                    ])->columnSpanFull(),
            ]);
    }
}
