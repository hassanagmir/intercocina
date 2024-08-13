<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TypeResource\Pages;
use App\Filament\Resources\TypeResource\RelationManagers;
use App\Models\Type;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TypeResource extends Resource
{
    protected static ?string $model = Type::class;

    protected static ?string $navigationIcon = 'heroicon-o-swatch';

    public static function getModelLabel(): string
    {
        return __("Type");
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([


                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label(__("Type"))
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\TagsInput::make('tags')
                                    ->label(__("Mots clés"))
                                    ->placeholder(__("Mot-clé"))
                                    ->separator(',')
                                    ->splitKeys(['Tab', ','])
                                    ->default(null),

                                Forms\Components\Textarea::make('description')
                                    ->columnSpanFull(),

                                Forms\Components\RichEditor::make('content')
                                    ->label(__("Contenu"))
                                    ->columnSpanFull(),

                            ])->columnSpan(2),


                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\Select::make('category_id')
                                    ->label(__("Catégorie"))
                                    ->native(false)
                                    ->preload()
                                    ->searchable()
                                    ->relationship('category', 'name'),
                                Forms\Components\FileUpload::make('image')
                                    ->image(),

                                Forms\Components\Toggle::make('status')
                                    ->inline(false)
                                    ->default(true)
                                    ->helperText('Rendre cette type visible pour tout le monde.')
                                    ->label(__("Visibilité"))
                                    ->required(),

                            ])->columnSpan(1)
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('tags')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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
            'index' => Pages\ListTypes::route('/'),
            'create' => Pages\CreateType::route('/create'),
            'edit' => Pages\EditType::route('/{record}/edit'),
        ];
    }
}
