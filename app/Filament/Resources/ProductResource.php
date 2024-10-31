<?php

namespace App\Filament\Resources;

use App\Enums\HeightUnitEnum;
use App\Enums\ProductStatusEnum;
use App\Enums\WeightUnitEnum;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Category;
use App\Models\Color;
use App\Models\Dimension;
use App\Models\Product;
use App\Models\Type;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    public static $dimansions = 300;

    public static function getModelLabel(): string
    {

        return __("Produit");
    }




    protected static ?string $recordTitleAttribute = "name";

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'description', 'tags', 'code'];
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
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),
                                Forms\Components\Select::make('status')
                                    ->native(false)
                                    ->options(ProductStatusEnum::toArray())
                                    ->required(),

                                Forms\Components\Select::make('category_id')
                                    ->native(false)
                                    ->preload(true)
                                    ->searchable()
                                    ->label(__("Catégorie"))
                                    ->options(Category::all()->pluck('name', 'id')->toArray())
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(function (Set $set) {
                                        $set('type_id', null);
                                    }),

                                Forms\Components\Select::make('type_id')
                                    ->native(false)
                                    ->preload(true)
                                    ->label(__("Type"))
                                    ->searchable()
                                    ->options(function (Get $get) {
                                        $categoryId = $get('category_id');
                                        if (!$categoryId) {
                                            return [];
                                        }
                                        return Type::where('category_id', $categoryId)->pluck('name', 'id')->toArray();
                                    })
                                    ->required()
                                    ->reactive()
                                    ->afterStateHydrated(function (Get $get, Set $set) {
                                        // This runs in edit mode when the form is loaded
                                        // self::$dimansions = Dimension::where('product_id', $query->id)->count();
                                        $typeId = $get('type_id');
                                        if ($typeId) {
                                            $categoryId = Type::find($typeId)?->category_id;
                                            if ($categoryId) {
                                                $set('category_id', $categoryId);
                                            }
                                        }
                                    }),

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
                                            ->required()
                                            ->label(false),
                                        Forms\Components\Select::make('color_id')
                                            ->relationship("color", "name")
                                            ->placeholder(__("Sélectionnez un couleur"))
                                            ->searchable()
                                            ->preload()
                                            ->label(false)
                                    ])
                                    ->orderColumn('order')
                                    ->reorderable(true)
                                    ->defaultItems(4)
                                    ->grid(4)
                            ]),


                        Forms\Components\Tabs\Tab::make('Dimensions')
                            ->label(__("Tarifs"))
                            ->live()
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

                                Forms\Components\Group::make()
                                    ->schema(function (Get $get) {
                                        $product = Product::find($get('id'));
                                        $dimensionCount = $product ? $product->dimensions()->count() : 0;

                                        if ($dimensionCount > 200) {
                                            return [
                                                Placeholder::make('dimensions_info')
                                                    ->content(" Ce produit comporte {$dimensionCount} dimensions. Utilisez l'interface de gestion des dimensions séparée pour les modifier.")
                                                    ->columns(2),
                                            ];
                                        }



                                        return [
                                            Forms\Components\Repeater::make('dimensions')
                                                ->hidden(fn(Get $get): bool => $get('is_dimensions'))
                                                ->label(false)
                                                ->relationship()
                                                ->schema([
                                                    Forms\Components\TextInput::make('code')
                                                        ->required()
                                                        ->unique(ignoreRecord: true)
                                                        ->label(__("Réf")),
                                                    Forms\Components\TextInput::make('price')
                                                        ->label(__("Prix"))
                                                        ->required()
                                                        ->numeric()
                                                        ->prefix('MAD'),
                                                    Forms\Components\TextInput::make('height')
                                                        ->label(__("Hauteur"))
                                                        ->numeric(),
                                                    Forms\Components\TextInput::make('width')
                                                        ->label(__("Largeur"))
                                                        ->numeric(),
                                                    
                                                    Forms\Components\TextInput::make('thicknesse')
                                                        ->label(__("Épaisseur"))
                                                        ->numeric(),
                                                    Forms\Components\TextInput::make('weight')
                                                        ->label(__("Poids"))
                                                        ->numeric(),

                                                    Forms\Components\Select::make('color_id')
                                                        ->label(__("Couleur"))
                                                        ->searchable()
                                                        ->preload()
                                                        ->placeholder("...")
                                                        ->relationship('color', 'name'),
                                                    
                                                    
                                                    Forms\Components\Select::make('weight_unit')
                                                        ->label(__("L'unité de poids"))
                                                        ->placeholder("__")
                                                        ->options(WeightUnitEnum::toArray()),
                                                    
                                                    Forms\Components\Select::make('height_unit')
                                                        ->label(__("L'unité de hauteur"))
                                                        ->placeholder("__")
                                                        ->options(HeightUnitEnum::toArray()),
                                                    

                                                    // Forms\Components\Select::make('image_reference')
                                                    //     ->label(__("Image"))
                                                    //     ->options(function (Get $get) {
                                                    //         $incrementedArray = [];
                                                    //         $i = 0;
                                                    //         foreach ($get('../../images') as $key => $value) {
                                                    //             $incrementedArray[$i++] = $i;
                                                    //         }
                                                    //         return $incrementedArray;
                                                    //     }),
                                                    Forms\Components\Select::make('attribute_id')
                                                        ->label(__("Attribut"))
                                                        ->searchable()
                                                        ->preload()
                                                        ->placeholder("...")
                                                        ->relationship('attribute', 'name'),
                                                ])
                                                ->mutateRelationshipDataBeforeFillUsing(function (array $data): array {
                                                    return $data;
                                                })
                                                ->columns(5)
                                                ->columnSpanFull()
                                                ->itemLabel(fn(array $state): ?string =>
                                                    "{$state['height']}x{$state['width']} - {$state['price']}MAD")
                                                ->collapsible()
                                                ->cloneable()
                                                ->reorderable()
                                                ->addActionLabel('Ajouter une dimension')
                                        ];
                                    })  
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
                    ->label("Produits")
                    ->searchable(),

                Tables\Columns\TextColumn::make('type.name')
                    ->label(__("Type"))
                    ->numeric()
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('code')
                    ->label(__("Référence"))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('dimensions_count')->counts('dimensions')
                    ->label(__("Dimensions"))
                    ->numeric(),

                Tables\Columns\SelectColumn::make('status')
                    ->options(ProductStatusEnum::toArray())
                    ->placeholder("__")
                    ->label("Etat"),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("Date de création"))
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
