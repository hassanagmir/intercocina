<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DimensionResource\Pages;
use App\Models\Dimension;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DimensionResource extends Resource
{
    protected static ?string $model = Dimension::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('width')
                            ->label(__("Largeur"))
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('height')
                            ->label(__("Hauteur"))
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('price')
                            ->label(__("Prix"))
                            ->required()
                            ->numeric()
                            ->prefix('MAD'),
                        Forms\Components\Select::make('product_id')
                            ->preload()
                            ->relationship('product', "name")
                            ->label(__("Produit"))
                            ->required(),
                        Forms\Components\Toggle::make('status')
                            ->inline(false)
                            ->helperText('Rendre cette dimension visible pour tout le monde.')
                            ->label(__("Visibilité"))
                            ->required(),
                    ])->columns(2)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('width')
                    ->label(__("Largeur"))
                    ->suffix(" mm")
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('height')
                    ->label(__("Hauteur"))
                    ->suffix(" mm")
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('product.name')
                    ->label(__("Produit"))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->badge()
                    ->label(__("Prix"))
                    ->suffix(" MAD")
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("Créé à"))
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDimensions::route('/'),
            'create' => Pages\CreateDimension::route('/create'),
            'edit' => Pages\EditDimension::route('/{record}/edit'),
        ];
    }
}
