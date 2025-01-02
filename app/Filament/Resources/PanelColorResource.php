<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PanelColorResource\Pages;
use App\Filament\Resources\PanelColorResource\RelationManagers;
use App\Models\PanelColor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PanelColorResource extends Resource
{
    protected static ?string $model = PanelColor::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-2-stack';

    public static function getModelLabel(): string
    {
        return __("Couleur du panneau");
    }


    public static function getPluralLabel(): ?string
    {
        return __("Couleurs des panneaux");
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\components\Grid::make(3)
                    ->schema([
                        Forms\components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label(__("Couleur"))
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Select::make('thickness')
                                    ->options([
                                        16 => 16,
                                        18 => 18,
                                        22 => 22,
                                    ])
                                    ->label(__("Épaisseur"))
                                    ->required(),
                                Forms\Components\TextInput::make('code')
                                    ->label(__("Référence"))
                                    ->maxLength(255),
                                Forms\Components\Select::make('type')
                                    ->options(['Aggloméré', 'MDF', 'HDF'])
                                    ->label(__("Type")),
                                Forms\Components\Textarea::make('description')
                                    ->columnSpanFull()
                                    ->label(__("Description"))
                                    ->maxLength(500),
                            ])
                            ->columnSpan(2)
                            ->columns(2),

                        Forms\components\Section::make()
                            ->schema([
                                Forms\Components\FileUpload::make('image')
                                    ->label(__("Image de couleur"))
                                    ->image()
                                    ->required(),

                            ])->columnSpan(1)

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label(__("Image")),
                Tables\Columns\TextColumn::make('name')
                    ->label(__("Couleur"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('thickness')
                    ->label(__("Épaisseur"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
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
            'index' => Pages\ListPanelColors::route('/'),
            'create' => Pages\CreatePanelColor::route('/create'),
            'edit' => Pages\EditPanelColor::route('/{record}/edit'),
        ];
    }
}
