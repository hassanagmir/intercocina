<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Filament\Resources\ReviewResource\RelationManagers;
use App\Models\Review;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Mokhosh\FilamentRating\Columns\RatingColumn;
use Mokhosh\FilamentRating\Components\Rating;


class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?string $navigationIcon = 'heroicon-o-star';

    protected static ?string $navigationGroup = "Porduits";

    public static function getModelLabel(): string
    {
        return __("Avis");
    }

    public static function getNavigationBadge(): ?string
    {
        return parent::getEloquentQuery()->where('status', false)->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make([
                    Forms\Components\TextInput::make('full_name')
                        ->label(__("Nom et prénom"))
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('email')
                        ->label(__("E-mail"))
                        ->email()
                        ->required()
                        ->maxLength(255),
                    
                    Forms\Components\Select::make('product_id')
                        ->label(__("Produit"))
                        ->relationship('product', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),
                    Rating::make('stars')
                        ->label(__("Notation"))
                        ->required(),
                    Forms\Components\Toggle::make('status')
                        ->required(),
                    Forms\Components\Textarea::make('comment')
                        ->label(__("Commentaire"))
                        ->columnSpanFull(),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->label(__("Nom complet"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label(__("E-mail"))
                    ->searchable(),
                RatingColumn::make('stars')
                    ->label(__("Notation")),
                Tables\Columns\TextColumn::make('product.name')
                    ->label(__("Produit"))
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->label(__("Status"))
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label(__("Crée le"))
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
