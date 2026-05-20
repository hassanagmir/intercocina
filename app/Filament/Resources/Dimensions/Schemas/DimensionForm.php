<?php

namespace App\Filament\Resources\Dimensions\Schemas;

use App\Enums\HeightUnitEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DimensionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                // ── Informations générales ──────────────────────────────
                Section::make('Informations générales')
                    ->icon('heroicon-o-information-circle')
                    ->columns(2)
                    ->schema([
                        TextInput::make('code')
                            ->label('Code')
                            ->placeholder('Ex : AC001001')
                            ->maxLength(50),

                        Select::make('product_id')
                            ->relationship('product', 'name')
                            ->searchable()
                            ->preload()
                            ->label('Produit')
                            ->required(),

                        Select::make('attribute_id')
                            ->relationship('attribute', 'name')
                            ->searchable()
                            ->preload()
                            ->label('Attribut'),

                        Select::make('color_id')
                            ->relationship('color', 'name')
                            ->searchable()
                            ->preload()
                            ->label('Couleur'),

                        Toggle::make('status')
                            ->label('Actif')
                            ->required()
                            ->onColor('success')
                            ->offColor('danger')
                            ->onIcon('heroicon-m-check')
                            ->offIcon('heroicon-m-x-mark')
                            ->inline(false),
                    ]),

                // ── Dimensions & mesures ────────────────────────────────
                Section::make('Dimensions & mesures')
                    ->icon('heroicon-o-arrows-pointing-out')
                    ->columns(3)
                    ->schema([
                        TextInput::make('width')
                            ->label('Largeur')
                            ->numeric()
                            ->minValue(0),

                        TextInput::make('height')
                            ->label('Hauteur')
                            ->numeric()
                            ->minValue(0),

                        TextInput::make('depth')
                            ->label('Profondeur')
                            ->numeric()
                            ->minValue(0),

                        TextInput::make('thicknesse')
                            ->label('Épaisseur')
                            ->placeholder('Ex : 2.5'),

                        TextInput::make('dimension')
                            ->label('Dimension (texte libre)')
                            ->placeholder('Ex : 40×60 cm'),

                        Select::make('height_unit')
                            ->label('Unité de hauteur')
                            ->options(HeightUnitEnum::class)
                            ->placeholder('Sélectionner une unité'),
                    ]),

                // ── Poids ───────────────────────────────────────────────
                Section::make('Poids')
                    ->icon('heroicon-o-scale')
                    ->columns(2)
                    ->schema([
                        TextInput::make('weight')
                            ->label('Poids')
                            ->placeholder('Ex : 1.5'),

                        TextInput::make('weight_unit')
                            ->label('Unité de poids')
                            ->numeric(),
                    ]),

                // ── Prix & stock ────────────────────────────────────────
                Section::make('Prix & stock')
                    ->icon('heroicon-o-currency-dollar')
                    ->columns(2)
                    ->schema([
                        TextInput::make('price')
                            ->label('Prix')
                            ->required()
                            ->numeric()
                            ->prefix('MAD')
                            ->minValue(0)
                            ->step(0.01),

                        TextInput::make('stock')
                            ->label('Stock')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->minValue(0),
                    ]),

                // ── Image de référence ──────────────────────────────────
                Section::make('Image de référence')
                    ->icon('heroicon-o-photo')
                    ->schema([
                        FileUpload::make('image_reference')
                            ->label('Image')
                            ->image()
                            ->imageEditor()
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->maxSize(2048)
                            ->helperText('Formats acceptés : JPG, PNG, WEBP — max 2 Mo'),
                    ]),

            ]);
    }
}