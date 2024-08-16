<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    public static function getModelLabel(): string
    {
        return __("Catégorie");
    }


    protected static ?string $navigationGroup = "Porduits";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)
                    ->schema([

                        Forms\Components\Section::make()
                            ->schema([

                                Forms\Components\TextInput::make('name')
                                    ->unique(ignoreRecord: true)
                                    ->label(__("Catégorie"))
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TagsInput::make('tags')
                                    ->label(__("Mots clés"))
                                    ->placeholder(__("Mot-clé"))
                                    ->separator(',')
                                    ->splitKeys(['Tab', ','])
                                    ->default(null),

                                Forms\Components\Textarea::make('description')
                                    ->rows(6)
                                    ->columnSpanFull(),

                            ])->columnSpan(2),

                        Forms\Components\Section::make()
                            ->make([

                                Forms\Components\FileUpload::make('image')
                                    ->label(__("Image"))
                                    ->image(),

                                Forms\Components\Toggle::make('status')
                                    ->inline(false)
                                    ->helperText('Rendre cette catégorie visible pour tout le monde.')
                                    ->label(__("Visibilité"))
                                    ->required(),

                            ])->columnSpan(1)

                    ])

            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')
                    ->label(__("Catégorie"))
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("Créé le"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__("Edité le"))
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
