<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CollectionResource\Pages;
use App\Filament\Resources\CollectionResource\RelationManagers;
use App\Models\Collection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CollectionResource extends Resource
{
    protected static ?string $model = Collection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                                    ->maxLength(255)
                                    ->required(),
                                Forms\Components\Textarea::make('description')
                                    ->label(__("Description"))
                                    ->required()
                                    ->columnSpanFull(),
                                Forms\Components\RichEditor::make('content')
                                    ->label(__("Contenu"))
                                    ->required()
                                    ->columnSpanFull(),
                            
                                Forms\Components\Select::make('products')
                                    ->relationship('products', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->multiple()
                            ])
                            ->columnSpan(2),
                        Forms\Components\Section::make()
                            ->columnSpan(1)
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->label(__("Image")),                                
                                Forms\Components\DatePicker::make('end_date')
                                    ->displayFormat('d F Y')
                                    ->closeOnDateSelection()
                                    ->locale('fr')
                                    ->native(false)
                                    ->label(__("Date de fin")),
                                Forms\Components\Toggle::make('status')
                                    ->label(__("État"))
                                    ->required(),
                            ]),

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__("Titre"))
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->label(__("État"))
                    ->boolean(),
                Tables\Columns\TextColumn::make('end_date')
                    ->label(__("Date de fin"))
                    ->date()
                    ->sortable(),

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
            'index' => Pages\ListCollections::route('/'),
            'create' => Pages\CreateCollection::route('/create'),
            'edit' => Pages\EditCollection::route('/{record}/edit'),
        ];
    }
}
