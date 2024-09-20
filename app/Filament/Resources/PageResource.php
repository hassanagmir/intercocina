<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Models\Page;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label(__("Titre"))
                                    ->required()
                                    ->maxLength(255),

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
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label(__("Image"))
                    ->placeholder("__"),
                Tables\Columns\TextColumn::make('title')
                    ->label(__("Titre"))
                    ->searchable(),
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
                ActionGroup::make([
                    Tables\Actions\EditAction::make()
                        ->color('success'),
                        
                    Action::make("view")
                        ->label("Voir")
                        ->icon("heroicon-o-arrow-top-right-on-square")
                        ->url(fn (Page $record): string => route('page.show', $record->slug))
                        ->color('info')
                        ->openUrlInNewTab(),
                    Tables\Actions\DeleteAction::make(),
                ]),
                
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
