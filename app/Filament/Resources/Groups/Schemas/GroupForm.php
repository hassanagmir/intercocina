<?php

namespace App\Filament\Resources\Groups\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GroupForm
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
                                    ->label('Nom')
                                    ->required(),

                                Textarea::make('description')
                                    ->label('Description')
                                    ->required()
                                    ->columnSpanFull(),

                                RichEditor::make('content')
                                    ->label('Contenu')
                                    ->columnSpanFull(),
                            ])
                            ->columnSpan(2),

                        Section::make()
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Image')
                                    ->image(),

                                Toggle::make('is_public')
                                    ->label('Publié')
                                    ->required(),
                            ])
                            ->columnSpan(1)
                    ])
                    ->columnSpanFull(),


                Grid::make(4)
                    ->schema([
                        Repeater::make('groupTypes')
                            ->relationship('groupTypes')
                            ->schema([
                                Select::make('type_id')
                                    ->label('Type')
                                    ->relationship('type', 'name')
                                    ->preload()
                                    ->required()
                                    ->searchable(),
                            ])
                            ->grid(4)
                            ->orderColumn('order')
                            ->reorderable()
                            ->collapsible()
                            ->cloneable()
                            ->addActionLabel("Ajouter à types")
                            ->columnSpanFull(1),
                    ])
                    ->columnSpanFull(),

            ]);
    }
}
