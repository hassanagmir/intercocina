<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Rmsramos\Activitylog\Actions\ActivityLogTimelineTableAction;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = "Autorisation";

    protected static ?string $recordTitleAttribute = "full_name";




    public static function getEloquentQuery(): Builder
    {
        if (auth()->user()->hasRole("commercial") || auth()->user()->hasRole("directeur_commercial")) {
            return parent::getEloquentQuery()->role('client');
        }
        return parent::getEloquentQuery();
    }
    



    public static function getModelLabel(): string
    {

        if (auth()->user()->hasRole("commercial")) {
            return __("Clients");
        }else{
            return __("Utilisateur");
        }
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['full_name', 'first_name', 'last_name', 'email', 'phone', 'code'];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\FileUpload::make('image')
                    ->label(__("Image"))
                    ->columnSpanFull()
                    ->avatar(),
                Forms\Components\TextInput::make('first_name')
                    ->label(__("Prénom"))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                    ->label(__("Nom"))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->label(__("Adresse"))
                    ->maxLength(255),
                Forms\Components\Select::make('gender')
                    ->native(false)
                    ->options([
                        'Mâle' => 'Mâle', 
                        'Femelle' => 'Femelle'
                    ])
                    ->label(__("Genre")),
                Forms\Components\TextInput::make('phone')
                    ->label(__("Téléphone"))
                    ->tel()
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->label(__("E-mail"))
                    ->email()
                    ->maxLength(255),
             
                Forms\Components\Select::make('status')
                    ->native(false)
                    ->options([
                        "active" =>  "Actif",
                        "inactive" => "Inactif"
                    ])
                    ->label(__("État"))
                    ->required(),
    
                (
                    auth()->user()->hasRole('super_admin') ? 
                    
                    Forms\Components\Select::make('roles')
                        ->relationship('roles', 'name')
                        ->multiple()
                        ->preload()
                        ->searchable() : 
                    
                        Forms\Components\Grid::make()
                )
                

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                    ->label(__("Prénom"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_name')
                    ->label(__("Nom"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->placeholder("__")
                    ->label(__("Téléphone"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('code')
                    ->placeholder("__")
                    ->label(__("Numéro")),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->label(__("État")),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("Date d'inscription"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__("Date de modification"))
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }


    public static function infolist(Infolists\Infolist $infolist): Infolists\Infolist
    {
        return $infolist
            ->schema([
                InfoLists\Components\Section::make()
                    ->schema([
                        Infolists\Components\TextEntry::make('full_name')
                            ->label(__("Nom complet")),

                        Infolists\Components\TextEntry::make('code')
                            ->placeholder('__')
                            ->label(__("Numéro")),

                        Infolists\Components\TextEntry::make('phone')
                            ->placeholder("__")
                            ->label(__("Téléphone")),
                        
                        
                        Infolists\Components\TextEntry::make('email')
                            ->placeholder('__')
                            ->label(__("E-mail")),
        
                        Infolists\Components\TextEntry::make('status')
                            ->placeholder('__')
                            ->badge()
                            ->label(__("Etat")),

                        Infolists\Components\TextEntry::make('gender')
                            ->placeholder('__')
                            ->badge()
                            ->label(__("Genre"))

                    ])->columns(3),

                Infolists\Components\RepeatableEntry::make('addresses')
                    ->label(__("Les adresses"))
                    ->schema([
                        Infolists\Components\TextEntry::make('address_name')
                            ->icon('heroicon-m-map-pin')
                            ->label(__("Adresse")),
                        Infolists\Components\TextEntry::make('phone')
                            ->icon('heroicon-m-phone')
                            ->label(__("Téléphone")),
                        Infolists\Components\TextEntry::make('email')
                            ->icon('heroicon-m-envelope')
                            ->label(__("E-mail")),
                        Infolists\Components\TextEntry::make('city.name')
                            ->icon('heroicon-m-building-office-2')
                            ->label(__("Ville")),
                    ])
                    ->columns(2)


            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
