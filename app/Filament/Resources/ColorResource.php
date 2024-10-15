<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ColorResource\Pages;
use App\Filament\Resources\ColorResource\RelationManagers;
use App\Models\Color;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ColorResource extends Resource
{
    protected static ?string $model = Color::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    
    protected static ?string $navigationGroup = "Porduits";


    public static function getModelLabel(): string
    {
        return __("couleur");
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label(__("Couleur"))
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('es_name')
                                    ->label(__("Couleur en espagnol"))
                                    ->maxLength(255)
                                    ->default(null),
                                Forms\Components\TextInput::make('code')
                                    ->label(__("Nombre"))
                                    ->maxLength(255)
                                    ->default(null),

                                Forms\Components\Toggle::make('status')
                                    ->inline(false)
                                    ->helperText('Rendre cette catégorie visible pour tout le monde.')
                                    ->label(__("Visibilité"))
                                    ->default(true)
                                    ->required(),
                            ])
                            ->columns(2)
                            ->columnSpan(2),

                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->label(__("Image du color"))
                                    ->avatar()
                                    ->alignCenter()
                                    ->image(),
                            ])->columnSpan(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\ImageColumn::make('image')
                    ->circular()
                    ->label(__("Image")),
                Tables\Columns\TextColumn::make('name')
                    ->label(__("Couleur"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('code')
                    ->placeholder("__")
                    ->label(__("Numero"))
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->label(__("Status"))
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("Crée le"))
                    ->dateTime()
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
            'index' => Pages\ListColors::route('/'),
            'create' => Pages\CreateColor::route('/create'),
            'edit' => Pages\EditColor::route('/{record}/edit'),
        ];
    }
}
