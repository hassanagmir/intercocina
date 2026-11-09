<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Illuminate\Database\Eloquent\Model;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function getModelLabel(): string
    {
        return __("Événement");
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
                                Forms\Components\Textarea::make('description')
                                    ->label(__("Descriptin"))
                                    ->columnSpanFull(),

                                Forms\Components\RichEditor::make('content')
                                    ->label(__("Contenu"))
                                    ->columnSpanFull(),
                                SpatieMediaLibraryFileUpload::make('attachments')
                                    ->responsiveImages()
                                    ->conversion(false)
                                    ->label(__("Pièces jointes (Images)"))
                                    ->helperText(__("L'image principale est la première et les autres images d'événement avant, vous pouvez télécharger plusieurs images et les réorganiser"))
                                    ->multiple()
                                    ->columns(2)
                                    ->columnSpanFull()
                                    ->reorderable(),
                            ])
                            ->columnSpan(2)
                            ->columns(2),

                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label(__("Titre"))
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('city')
                                    ->label(__("Ville"))
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('date')
                                    ->label(__("Date"))
                                    ->native(false)
                                    ->required(),

                            ])->columnSpan(1)

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
                Tables\Columns\TextColumn::make('city')
                    ->label(__("Ville"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('date')
                    ->label(__("Date"))
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('user')
                    ->state(function (Model $query) {
                        return $query->first_name;
                    })
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
