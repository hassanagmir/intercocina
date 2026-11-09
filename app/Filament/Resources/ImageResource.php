<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImageResource\Pages;
use App\Filament\Resources\ImageResource\RelationManagers;
use App\Models\Image;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ImageResource extends Resource
{
    protected static ?string $model = Image::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function getModelLabel(): string
    {
        return __("Images des produits");
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('product_id')
                    ->label(__("Produit"))
                    ->required()
                    ->relationship('product', 'name')
                    ->preload()
                    ->searchable(),

                Forms\Components\Select::make('color_id')
                    ->label(__("Couleur"))
                    ->relationship('color', 'name')
                    ->preload()
                    ->searchable(),

                Forms\Components\FileUpload::make('image')
                    ->label(__("Image"))
                    ->image()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('product.name')
                    ->label(__("Produit"))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('color.name')
                    ->label(__("Couleur"))
                    ->searchable()
                    ->placeholder("__")
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListImages::route('/'),
            'create' => Pages\CreateImage::route('/create'),
            'edit' => Pages\EditImage::route('/{record}/edit'),
        ];
    }
}
