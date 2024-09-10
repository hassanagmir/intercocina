<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrandResource\Pages;
use App\Filament\Resources\BrandResource\RelationManagers;
use App\Models\Brand;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';

    public static function getModelLabel(): string
    {
        return __("Marque");
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


                        Forms\Components\Section::make()
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






                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label(__("Logo"))
                    // ->circular()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label(__("Marque"))
                    ->searchable(),
                    
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("Crée le"))
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
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }
}
