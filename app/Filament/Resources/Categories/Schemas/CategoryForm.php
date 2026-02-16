<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        Section::make()
                            ->schema([
                                Textarea::make('description')
                                    ->label(__('Description'))
                                    ->rows(3)
                                    ->maxLength(500)
                                    ->columnSpanFull(),

                                TagsInput::make('tags')
                                    ->label(__('Tags'))
                                    ->separator(','),

                                RichEditor::make('content')
                                    ->label(__('Contenu'))
                                    ->columnSpanFull(),
                            ])->columnSpan(2),

                        Section::make()
                            ->columnSpan(1)
                            ->schema([
                                TextInput::make('name')
                                    ->label(__('Category'))
                                    ->required()
                                    ->maxLength(255),
                                FileUpload::make('image')
                                    ->label(__('Image'))
                                    ->image()
                                    ->imageEditor()
                                    ->maxSize(2048)
                                    ->directory('categories'),
                                Toggle::make('status')
                                    ->label(__('Actif'))
                                    ->default(true)
                                    ->inline(false),
                            ])
                    ])->columnSpanFull(),
            ]);
    }
}
