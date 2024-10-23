<?php

namespace App\Filament\Resources;

use App\Enums\ClaimStatusEnum;
use App\Filament\Resources\ReclamationResource\Pages;
use App\Filament\Resources\ReclamationResource\RelationManagers;
use App\Models\Reclamation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Infolists;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReclamationResource extends Resource
{
    protected static ?string $model = Reclamation::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';

    public static function getModelLabel(): string
    {
        return __("Réclamation");
    }


    public static function canCreate(): bool
    {
        return false;
    }


    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function getNavigationBadge(): ?string
    {
        return parent::getEloquentQuery()->where('status', 1)->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('client_number')

                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('full_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('subject')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('message')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->label(__("Nom et prénom"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('client_number')
                    ->label(__("Numéro de client"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label(__("Téléphone"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('subject')
                    ->label(__("Sujet"))
                    ->searchable(),

                Tables\Columns\SelectColumn::make('status')
                    ->options(ClaimStatusEnum::class)
                    ->label(__("Etat"))
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
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolists\Infolist $infolist): Infolists\Infolist
    {
        return $infolist->schema([
            Infolists\Components\Section::make()
                ->schema([
                    Infolists\Components\TextEntry::make('full_name')
                        ->label(__("Nom et prénom")),
                    Infolists\Components\TextEntry::make('client_number')
                        ->badge()
                        ->label(__("Numéro de client")),
                    Infolists\Components\TextEntry::make('phone')
                        ->label(__("Téléphone")),
                    Infolists\Components\TextEntry::make('subject')
                        ->label(__("Sujet")),
                    Infolists\Components\TextEntry::make('message')
                        ->columnSpanFull()
                        ->label(__("Message")),
                ])->columns(3)


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
            'index' => Pages\ListReclamations::route('/'),
            'create' => Pages\CreateReclamation::route('/create'),
            'edit' => Pages\EditReclamation::route('/{record}/edit'),
            'view' => Pages\ViewReclamation::route('/{record}/view')
        ];
    }
}
