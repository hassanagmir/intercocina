<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Enums\HeightUnitEnum;
use App\Enums\ProductStatusEnum;
use App\Enums\WeightUnitEnum;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Type;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class ProductForm
{
    // public static function configure(Schema $schema): Schema
    // {
    //     return $schema
    //         ->components([
    //             TextInput::make('order')
    //                 ->numeric(),
    //             TextInput::make('name')
    //                 ->required(),
    //             TextInput::make('es_name'),
    //             TextInput::make('price'),
    //             TextInput::make('old_price'),
    //             Textarea::make('description')
    //                 ->columnSpanFull(),
    //             TextInput::make('code'),
    //             TextInput::make('type_id')
    //                 ->required()
    //                 ->numeric(),
    //             Textarea::make('content')
    //                 ->columnSpanFull(),
    //             Textarea::make('options')
    //                 ->columnSpanFull(),
    //             Select::make('status')
    //                 ->options(ProductStatusEnum::class)
    //                 ->default('1')
    //                 ->required(),
    //             TextInput::make('slug')
    //                 ->required(),
    //             TextInput::make('tags'),
    //             TextInput::make('unit'),
    //         ]);
    // }

    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Produit')
                            ->schema([
                                TextInput::make('name')
                                    ->label(__("Nom du produit"))
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('code')
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),

                                Select::make('status')
                                    ->native(false)
                                    ->options(ProductStatusEnum::toArray())
                                    ->required(),

                                
                                Select::make('category_id')
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

                                Select::make('family_id')
                                    ->relationship('family', 'name')
                                    ->native(false)
                                    ->preload(true)
                                    ->searchable()
                                    ->label(__("Famille"))
                                    // ->options(Category::all()->pluck('name', 'id')->toArray())
                                    ->required()
                                    ->reactive(),
                                    // ->afterStateUpdated(function (Set $set) {
                                    //     $set('type_id', null);
                                    // }),

                                Select::make('type_id')
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

                                Select::make('unit')
                                    ->searchable()
                                    ->label(__("Unit"))
                                    ->options([
                                        'Longueur' => [
                                            'mm' => 'mm',
                                            'cm' => 'cm',
                                            'm' => 'm',
                                        ],
                                        'Surface' => [
                                            'mm²' => 'mm²',
                                            'cm²' => 'cm²',
                                            'm²' => 'm²',
                                        ],
                                        'Poids' => [
                                            'g' => 'g',
                                            'kg' => 'kg',
                                        ],
                                        'Volume' => [
                                            'ml' => 'ml',
                                            'L' => 'L',
                                        ],
                                    ]),

                                Textarea::make('description')
                                    ->rows(5)
                                    ->columnSpanFull(),

                            ])->columns(3),
                        Tabs\Tab::make('Images')
                            ->schema([
                                Repeater::make("images")
                                    ->relationship()
                                    ->schema([
                                        FileUpload::make('image')
                                            ->image()
                                            ->required()
                                            ->label(false),
                                        Select::make('color_id')
                                            ->relationship("color", "name")
                                            ->label(__("Couleur"))
                                            ->placeholder(__("Sélectionnez un couleur"))
                                            ->searchable()
                                            ->preload()
                                    ])
                                    ->orderColumn('order')
                                    ->reorderable(true)
                                    ->defaultItems(4)
                                    ->grid(4)
                            ]),


                        Tabs\Tab::make('Dimensions')
                            ->label(__("Tarifs"))
                            ->live()
                            ->schema([
                                Toggle::make('is_dimensions')
                                    ->live()
                                    ->label('Avec le prix'),

                                Grid::make(2)
                                    ->schema([
                                        TextInput::make('price')
                                            ->hidden(fn(Get $get): bool => !$get('is_dimensions'))
                                            ->prefix("MAD")
                                            ->required(fn(Get $get): bool => !$get('is_dimensions'))
                                            ->numeric()
                                            ->columnSpan(1)
                                            ->label('Prix'),

                                        TextInput::make('old_price')
                                            ->hidden(fn(Get $get): bool => !$get('is_dimensions'))
                                            ->prefix("MAD")
                                            ->numeric()
                                            ->columnSpan(1)
                                            ->label('Ancien prix'),
                                    ]),

                                Group::make()
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
                                            Repeater::make('dimensions')
                                                ->hidden(fn(Get $get): bool => $get('is_dimensions'))
                                                ->label(false)
                                                ->relationship()
                                                ->schema([
                                                    TextInput::make('code')
                                                        ->required()
                                                        ->unique(ignoreRecord: true)
                                                        ->label(__("Réf")),
                                                    TextInput::make('price')
                                                        ->label(__("Prix"))
                                                        ->required()
                                                        ->numeric()
                                                        ->prefix('MAD'),
                                                    TextInput::make('height')
                                                        ->label(__("Hauteur"))
                                                        ->numeric(),
                                                    TextInput::make('width')
                                                        ->label(__("Largeur"))
                                                        ->numeric(),

                                                    TextInput::make('thicknesse')
                                                        ->label(__("Épaisseur"))
                                                        ->numeric(),
                                                    TextInput::make('weight')
                                                        ->label(__("Poids"))
                                                        ->numeric(),

                                                    Select::make('color_id')
                                                        ->label(__("Couleur"))
                                                        ->searchable()
                                                        ->preload()
                                                        ->placeholder("...")
                                                        ->relationship('color', 'name'),


                                                    Select::make('weight_unit')
                                                        ->label(__("L'unité de poids"))
                                                        ->placeholder("__")
                                                        ->options(WeightUnitEnum::toArray()),

                                                    Select::make('height_unit')
                                                        ->label(__("L'unité de hauteur"))
                                                        ->placeholder("__")
                                                        ->options(HeightUnitEnum::toArray()),


                                                    //Select::make('image_reference')
                                                    //     ->label(__("Image"))
                                                    //     ->options(function (Get $get) {
                                                    //         $incrementedArray = [];
                                                    //         $i = 0;
                                                    //         foreach ($get('../../images') as $key => $value) {
                                                    //             $incrementedArray[$i++] = $i;
                                                    //         }
                                                    //         return $incrementedArray;
                                                    //     }),
                                                    Select::make('attribute_id')
                                                        ->label(__("Attribut"))
                                                        ->searchable()
                                                        ->preload()
                                                        ->placeholder("...")
                                                        ->relationship('attribute', 'name'),

                                                    TextInput::make('depth')
                                                        ->label(__("Profondeur"))
                                                        ->numeric(),
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

                Section::make()
                    ->schema([
                        KeyValue::make('options')
                            ->reorderable()
                            ->columnSpanFull(),

                        RichEditor::make('content')
                            ->label(__("Contenu"))
                            ->columnSpanFull(),

                        Select::make('colore')
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



                        Select::make('attributes')
                            ->label(__("Attributes"))
                            ->relationship('attributes', 'name')
                            ->native(false)
                            ->multiple()
                            ->nullable()
                            ->searchable()
                            ->preload(),

                        TagsInput::make('tags')
                            ->label(__("Mots clés"))
                            ->placeholder(__("Mot-clé"))
                            ->separator(',')
                            ->splitKeys(['Tab', ','])
                            ->default(null),

                        Select::make('related')
                            ->label(__("Produits liés"))
                            ->relationship('related', 'name')
                            ->native(false)
                            ->multiple()
                            ->nullable()
                            ->searchable()
                            ->preload(),
                    ])->columnSpanFull()->columns(2),
            ]);
    }


    public static function ColorForm()
    {
        return [
            Section::make()
                ->schema([
                    TextInput::make('name')
                        ->label(__("Couleur"))
                        ->required()
                        ->maxLength(255),

                    TextInput::make('es_name')
                        ->label(__("Couleur en espagnol"))
                        ->maxLength(255)
                        ->default(null),

                    TextInput::make('code')
                        ->label(__("Nombre"))
                        ->maxLength(255)
                        ->default(null),

                    Toggle::make('status')
                        ->inline(false)
                        ->helperText('Rendre cette catégorie visible pour tout le monde.')
                        ->label(__("Visibilité"))
                        ->default(true)
                        ->required(),

                    FileUpload::make('image')
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
}
