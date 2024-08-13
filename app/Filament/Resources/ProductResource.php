<?php

namespace App\Filament\Resources;

use App\Enums\ProductStatusEnum;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Color;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    public static function getModelLabel(): string
    {
        return __("Produit");
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__("Nom du produit"))
                            ->required()
                            ->maxLength(255),
                        // Forms\Components\TextInput::make('es_name')
                        //     ->label(__("Nom du produit en espagnol"))
                        //     ->maxLength(255)
                        //     ->default(null),
                        Forms\Components\TextInput::make('code')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('status')
                            ->native(false)
                            ->options(ProductStatusEnum::toArray())
                            ->required(),

                        Forms\Components\Select::make('type_id')
                            ->native(false)
                            ->preload(true)
                            ->searchable()
                            ->relationship('type', 'name')
                            ->required(),
                        Forms\Components\Textarea::make('description')
                            ->columnSpanFull(),
                        Forms\Components\KeyValue::make('options')
                            ->reorderable()
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('content')
                            ->columnSpanFull(),

                        Forms\Components\Select::make('colore')
                            ->label(__("Color"))
                            ->relationship('colors', 'name')
                            ->native(false)
                            ->multiple()
                            ->nullable()
                            ->searchable()
                            ->preload()
                            ->live()
                            ->createOptionForm(self::ColorForm())
                            ->createOptionModalHeading(__("Color"))
                            ->createOptionUsing(function (array $data): int {
                                $color = Color::create($data);
                                return $color->getKey();
                            }),
                    ])->columns(2),

                Forms\Components\Repeater::make('dimensions')
                    ->relationship()
                    ->schema([
                        Forms\Components\TextInput::make('width')
                            ->label(__("Largeur"))
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('height')
                            ->label(__("Hauteur"))
                            ->required()
                            ->numeric(),
                        Forms\Components\TextInput::make('price')
                            ->label(__("Prix"))
                            ->required()
                            ->numeric()
                            ->prefix('MAD'),
                        Forms\Components\Toggle::make('status')
                            ->default(true)
                            ->required(),
                    ])
                    ->mutateRelationshipDataBeforeFillUsing(function (array $data): array {
                        return $data;
                    })
                    ->grid(2)
                    // ->collapsed()
                    ->columns(3)
                    ->columnSpanFull()
                    ->cloneable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('es_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
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

    public static function ColorForm()
    {
        return [
            
            Forms\Components\Section::make()
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__("Couleur"))
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('es_name')
                    ->label(__("Couleur en espagnol"))
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('code')
                    ->label(__("Nombre"))
                    ->maxLength(255)
                    ->default(null),

                Forms\Components\Toggle::make('status')
                    ->inline(false)
                    ->helperText('Rendre cette catégorie visible pour tout le monde.')
                    ->label(__("Visibilité"))
                    ->default(true)
                    ->required(),

            ])
            ->columns(2)
            ->columnSpan(2),
        ];
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
