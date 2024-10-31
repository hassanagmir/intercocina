<?php

namespace App\Filament\Resources;

use App\Enums\HeightUnitEnum;
use App\Enums\WeightUnitEnum;
use App\Filament\Exports\DimensionExporter;
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

    protected static ?string $recordTitleAttribute = "dimension";

    public static function getGloballySearchableAttributes(): array
    {
        return ['dimension', 'code', 'product.name'];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('code')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->label(__("Réf")),

                        Forms\Components\TextInput::make('price')
                            ->label(__("Prix"))
                            ->required()
                            ->numeric()
                            ->prefix('MAD'),

                        Forms\Components\TextInput::make('height')
                            ->label(__("Hauteur"))
                            ->numeric(),

                        Forms\Components\TextInput::make('width')
                            ->label(__("Largeur"))
                            ->numeric(),

                        Forms\Components\TextInput::make('thicknesse')
                            ->label(__("Épaisseur"))
                            ->numeric(),

                        Forms\Components\TextInput::make('weight')
                            ->label(__("Poids"))
                            ->numeric(),

                        Forms\Components\Select::make('color_id')
                            ->label(__("Couleur"))
                            ->searchable()
                            ->preload()
                            ->placeholder("...")
                            ->relationship('color', 'name'),

                        Forms\Components\Select::make('product_id')
                            ->label(__("Produit"))
                            ->searchable()
                            ->preload()
                            ->placeholder("...")
                            ->relationship('product', 'name'),
                            
                        Forms\Components\Select::make('weight_unit')
                            ->label(__("L'unité de poids"))
                            ->placeholder("__")
                            ->options(WeightUnitEnum::toArray()),

                        Forms\Components\Select::make('height_unit')
                            ->label(__("L'unité de hauteur"))
                            ->placeholder("__")
                            ->options(HeightUnitEnum::toArray()),

                        Forms\Components\Select::make('attribute_id')
                            ->label(__("Attribut"))
                            ->searchable()
                            ->preload()
                            ->placeholder("...")
                            ->relationship('attribute', 'name'),


                        Forms\Components\Toggle::make('status')
                            ->inline(false)
                            ->helperText('Rendre cette dimension visible pour tout le monde.')
                            ->label(__("Visibilité"))
                            ->required(),
                    ])->columns(3)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')
                    ->label(__("Référence"))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('height')
                    ->label(__("Hauteur"))
                    ->placeholder("__")
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('width')
                    ->label(__("Largeur"))
                    ->placeholder("__")
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('weight')
                    ->label(__("Poids"))
                    ->placeholder("__")
                    ->numeric()
                    ->sortable(),


                Tables\Columns\TextColumn::make('product.name')
                    ->label(__("Produit"))
                    ->searchable()
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
                    Tables\Actions\ExportBulkAction::make()
                        ->exporter(DimensionExporter::class)
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
