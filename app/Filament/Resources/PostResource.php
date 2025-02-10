<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';

    public static function getModelLabel(): string
    {
        return __("Article");
    }

    protected static ?string $navigationGroup = "Plus d'options";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->placeholder(__("Titre de l'article"))
                                    ->label(__("Titre"))
                                    ->required()
                                    ->maxLength(255),

                                Forms\Components\Select::make('products')
                                    ->multiple()
                                    ->preload()
                                    ->searchable()
                                    ->relationship('products', 'name'),
                                
                                Forms\Components\Textarea::make('description')
                                    ->columnSpanFull(),
                                    
                                Forms\Components\RichEditor::make('content')
                                    ->label(__("Contenu"))
                                    ->columnSpanFull(),

                            ])
                            ->columnSpan(2),


                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->image()
                                    ->image(),
                                Forms\Components\TagsInput::make('tags')
                                    ->label(__("Mots clés"))
                                    ->placeholder(__("Mot-clé"))
                                    ->separator(',')
                                    ->splitKeys(['Tab', ','])
                                    ->default(null),
                            ])->columnSpan(1),
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label(__("Images")),
                Tables\Columns\TextColumn::make('title')
                    ->label(__("Titre"))
                    ->searchable(),                
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("Créé à"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
