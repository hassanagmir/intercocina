<?php

namespace App\Filament\Resources;

use App\Enums\ProductStatusEnum;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Color;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
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

    protected static ?string $recordTitleAttribute = "name";

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'description', 'tags'];
    }

    protected static ?string $navigationGroup = "Porduits";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Tabs')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Produit')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label(__("Nom du produit"))
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('code')
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
                                    ->rows(5)
                                    ->columnSpanFull(),
                            ])->columns(2),
                        Forms\Components\Tabs\Tab::make('Images')
                            ->schema([
                                Forms\Components\Repeater::make("images")
                                    ->relationship()
                                    ->schema([
                                        Forms\Components\FileUpload::make('image')
                                            ->image()
                                            ->label(false)
                                    ])
                                    ->orderColumn('order')
                                    ->reorderable(true)
                                    ->defaultItems(4)
                                    ->grid(4)
                            ]),
                        Forms\Components\Tabs\Tab::make('Dimensions')
                            ->label(__("Tarifs"))
                            ->schema([
                                Forms\Components\Toggle::make('is_dimensions')
                                    ->live()
                                    ->label('Avec le prix'),

                                Forms\Components\Grid::make(2)
                                    ->schema([
                                        Forms\Components\TextInput::make('price')
                                            ->hidden(fn(Get $get): bool => !$get('is_dimensions'))
                                            ->prefix("MAD")
                                            ->required(fn(Get $get): bool => !$get('is_dimensions'))
                                            ->numeric()
                                            ->columnSpan(1)
                                            ->label('Prix'),

                                        Forms\Components\TextInput::make('old_price')
                                            ->hidden(fn(Get $get): bool => !$get('is_dimensions'))
                                            ->prefix("MAD")
                                            ->numeric()
                                            ->columnSpan(1)
                                            ->label('Ancien prix'),
                                    ]),

                                Forms\Components\Repeater::make('dimensions')
                                    ->hidden(fn(Get $get): bool => $get('is_dimensions'))
                                    ->label(false)
                                    ->relationship()
                                    ->schema([

                                        Forms\Components\TextInput::make('height')
                                            ->label(__("Hauteur"))
                                            ->required()
                                            ->numeric(),

                                        Forms\Components\TextInput::make('width')
                                            ->label(__("Largeur"))
                                            ->required()
                                            ->numeric(),
                                        Forms\Components\TextInput::make('price')
                                            ->label(__("Prix"))
                                            ->required()
                                            ->numeric()
                                            ->prefix('MAD'),
                                        Forms\Components\TextInput::make('code')
                                            ->unique(ignoreRecord: true)
                                            ->label(__("Référence"))
                                            ->required(),


                                        Forms\Components\Select::make('image_reference')
                                            ->label(__("Référence d'image"))
                                            ->live()
                                            ->options(function (Get $get) {
                                                $incrementedArray = [];
                                                $i = 0;
                                                foreach ($get('../../images') as $key => $value) {
                                                    $incrementedArray[$i++] = $i;
                                                }
                                                return $incrementedArray;
                                            }),
                                        // Forms\Components\Toggle::make('status')
                                        //     ->inline(false)
                                        //     ->default(true)
                                        //     ->required(),

                                        Forms\Components\Select::make('color_id')
                                            ->label(__("Couleur"))
                                            ->searchable()
                                            ->preload()
                                            ->placeholder("Couleur...")
                                            ->relationship('color', 'name'),

                                        Forms\Components\Select::make('attribute_id')
                                            ->label(__("Attribut"))
                                            ->searchable()
                                            ->placeholder("Attribut...")
                                            ->relationship('attribute', 'name'),

                                    ])
                                    ->mutateRelationshipDataBeforeFillUsing(function (array $data): array {
                                        return $data;
                                    })
                                    ->grid(2)
                                    ->columns(3)
                                    ->columnSpanFull()
                                    ->cloneable()
                            ]),
                    ])->columnSpanFull(),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\KeyValue::make('options')
                            ->reorderable()
                            ->columnSpanFull(),

                        Forms\Components\RichEditor::make('content')
                            ->label(__("Contenu"))
                            ->columnSpanFull(),

                        Forms\Components\Select::make('colore')
                            ->label(__("Couleur"))
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
                        Forms\Components\TagsInput::make('tags')
                            ->label(__("Mots clés"))
                            ->placeholder(__("Mot-clé"))
                            ->separator(',')
                            ->splitKeys(['Tab', ','])
                            ->default(null),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\SelectColumn::make('status')
                    ->options(ProductStatusEnum::toArray())
                    ->placeholder("__")
                    ->label("Etat"),

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

                    Forms\Components\FileUpload::make('image')
                        ->label(false)
                        ->placeholder(__("Image du Couleur"))
                        ->alignStart()
                        ->avatar()
                        ->alignCenter()
                        ->image(),

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
