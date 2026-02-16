<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                 Grid::make(3)
                    ->schema([

                        Section::make()
                            ->schema([
                                Forms\Components\Textarea::make('description')
                                    ->label(__("Descriptin"))
                                    ->columnSpanFull(),

                                Forms\Components\RichEditor::make('content')
                                    ->label(__("Contenu"))
                                    ->columnSpanFull(),
                                SpatieMediaLibraryFileUpload::make('attachments')
                                    ->responsiveImages()
                                    ->conversion(false)
                                    ->label(__("Pièces jointes (Images)"))
                                    ->helperText(__("L'image principale est la première et les autres images d'événement avant, vous pouvez télécharger plusieurs images et les réorganiser"))
                                    ->multiple()
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->reorderable(),
                            ])
                            ->columnSpan(2)
                            ->columns(2),

                        Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label(__("Titre"))
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('city')
                                    ->label(__("Ville"))
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('date')
                                    ->label(__("Date"))
                                    ->native(false)
                                    ->required(),

                            ])->columnSpan(1)

                    ])->columnSpanFull()

            ]);
    }
}
