<?php

namespace App\Filament\Resources\ViewColors\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;

class ViewColorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->columnSpan(1)
                            ->alignCenter()
                            ->required(),
                    ])->columnSpanFull(),
                TextInput::make('name')
                    ->label(__("Couleur"))
                    ->required(),
                TextInput::make('code')
                    ->label(__('Référence')),
                Select::make('product_id')
                    ->label(__("Produit"))
                    ->required()
                    ->relationship('product', 'name'),

            ])->columns(3);
    }
}
