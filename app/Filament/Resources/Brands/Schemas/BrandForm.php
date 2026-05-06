<?php

namespace App\Filament\Resources\Brands\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([

                        Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->placeholder(__("Nom du marque"))
                                    ->label(__("Nom"))
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TagsInput::make('tags')
                                    ->label(__("Mots clés"))
                                    ->placeholder(__("Mot-clé"))
                                    ->separator(',')
                                    ->splitKeys(['Tab', ','])
                                    ->default(null),

                                Forms\Components\Textarea::make('description')
                                    ->rows(5)
                                    ->columnSpanFull(),
                            ])->columnSpan(2),


                        Section::make()
                            ->schema([
                                Forms\Components\FileUpload::make('logo')

                                    ->required()
                                    ->columnSpanFull()
                                    ->alignCenter()
                                    ->label(false)
                                    ->image(),
                                Forms\Components\Toggle::make('status')
                                    ->inline(false)
                                    ->helperText('Rendre cette marque visible pour tout le monde.')
                                    ->label(__("Visibilité"))
                                    ->default(true)
                                    ->required(),
                            ])->columnSpan(1),

                    ])->columnSpanfull()
            ]);
    }
}
