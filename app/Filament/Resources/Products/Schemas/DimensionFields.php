<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Enums\HeightUnitEnum;
use App\Enums\WeightUnitEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class DimensionFields
{
    public static function make(): array
    {
        return [
            TextInput::make('code')
                ->label(__('Réf'))
                ->required()
                ->maxLength(255)
                ->unique(ignoreRecord: true),

            TextInput::make('price')
                ->label(__('Prix'))
                ->required()
                ->numeric()
                ->prefix('MAD'),

            TextInput::make('height')->label(__('Hauteur'))->numeric(),
            TextInput::make('width')->label(__('Largeur'))->numeric(),
            TextInput::make('thicknesse')->label(__('Épaisseur'))->numeric(),
            TextInput::make('depth')->label(__('Profondeur'))->numeric(),
            TextInput::make('weight')->label(__('Poids'))->numeric(),

            Select::make('height_unit')
                ->label(__('Unité H'))
                ->options(HeightUnitEnum::toArray())
                ->native(false)
                ->placeholder('__'),

            Select::make('weight_unit')
                ->label(__('Unité P'))
                ->options(WeightUnitEnum::toArray())
                ->native(false)
                ->placeholder('__'),

            Select::make('color_id')
                ->label(__('Couleur'))
                ->relationship('color', 'name')
                ->searchable()
                ->placeholder('...'),

            Select::make('attribute_id')
                ->label(__('Attribut'))
                ->relationship('attribute', 'name')
                ->searchable()
                ->placeholder('...'),
        ];
    }
}