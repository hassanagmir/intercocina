<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CoverResource\Pages;
use App\Filament\Resources\CoverResource\RelationManagers;
use App\Models\Cover;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CoverResource extends Resource
{
    protected static ?string $model = Cover::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';

    public static function getModelLabel(): string
    {
        return __("Couverture");
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label(__("Titre"))
                            ->maxLength(255),
                        Forms\Components\TextInput::make('url')
                            ->label(__("Lien"))
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->required(),
                    ])->columns(2)

               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('title')
                    ->label(__("Titre"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                ->label(__("Lien"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("Créé à"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__("Modifié à"))
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
            'index' => Pages\ListCovers::route('/'),
            'create' => Pages\CreateCover::route('/create'),
            'edit' => Pages\EditCover::route('/{record}/edit'),
        ];
    }
}
