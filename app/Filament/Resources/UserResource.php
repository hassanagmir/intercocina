<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
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

    public static function getModelLabel(): string
    {
        return __("Utilisateur");
    }

    protected static ?string $recordTitleAttribute = "full_name";

    public static function getGloballySearchableAttributes(): array
    {
        return ['full_name', 'first_name', 'last_name', 'email', 'phone'];
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
    
                Forms\Components\Select::make('roles')
                    ->relationship('roles', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()

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
                    ->label(__("Téléphone"))
                    ->searchable(),
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
                ActivityLogTimelineTableAction::make('Activities'),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
