<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Enums\ProductStatusEnum;
use App\Filament\Resources\Products\RelationManagers\DimensionsRelationManager;
use App\Models\Category;
use App\Models\Color;
use App\Models\Type;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Pages\Page;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Livewire;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Tabs::make('Tabs')
                ->extraAttributes(['class' => 'compact-form'])
                ->columnSpanFull()
                ->persistTabInQueryString()
                ->tabs([

                    /* ---------------- PRODUIT ---------------- */
                    Tab::make('Produit')->schema([
                        Grid::make(['default' => 1, 'md' => 3, 'xl' => 4])->schema([
                            TextInput::make('name')
                                ->label(__('Nom du produit'))
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(['md' => 2]),

                            TextInput::make('code')
                                ->unique(ignoreRecord: true)
                                ->maxLength(255),

                            Select::make('status')
                                ->native(false)
                                ->options(ProductStatusEnum::toArray())
                                ->required(),

                            Select::make('category_id')
                                ->label(__('Catégorie'))
                                ->options(once(fn () => Category::orderBy('name')->pluck('name', 'id')->toArray()))
                                ->native(false)
                                ->searchable()
                                ->required()
                                ->live()
                                ->afterStateUpdated(fn (Set $set) => $set('type_id', null)),

                            Select::make('family_id')
                                ->label(__('Famille'))
                                ->relationship('family', 'name')
                                ->native(false)
                                ->searchable()
                                ->preload()
                                ->required(),

                            Select::make('type_id')
                                ->label(__('Type'))
                                ->native(false)
                                ->searchable()
                                ->required()
                                ->live()
                                ->options(function (Get $get) {
                                    $categoryId = $get('category_id');

                                    return $categoryId
                                        ? Type::where('category_id', $categoryId)->pluck('name', 'id')->toArray()
                                        : [];
                                })
                                ->afterStateHydrated(function (Get $get, Set $set) {
                                    $typeId = $get('type_id');
                                    if ($typeId && ! $get('category_id')) {
                                        $categoryId = Type::whereKey($typeId)->value('category_id');
                                        if ($categoryId) {
                                            $set('category_id', $categoryId);
                                        }
                                    }
                                }),

                            Select::make('unit')
                                ->label(__('Unité'))
                                ->native(false)
                                ->searchable()
                                ->options([
                                    'Longueur' => ['mm' => 'mm', 'cm' => 'cm', 'm' => 'm'],
                                    'Surface'  => ['mm²' => 'mm²', 'cm²' => 'cm²', 'm²' => 'm²'],
                                    'Poids'    => ['g' => 'g', 'kg' => 'kg'],
                                    'Volume'   => ['ml' => 'ml', 'L' => 'L'],
                                ]),

                            Toggle::make('is_new')
                                ->inline(false)
                                ->label(__('Nouveau')),

                            Textarea::make('description')
                                ->rows(3)
                                ->columnSpanFull(),
                        ]),
                    ]),

                    /* ---------------- IMAGES ---------------- */
                    Tab::make('Images')->schema([
                        Repeater::make('images')
                            ->relationship()
                            ->label(false)
                            ->orderColumn('order')
                            ->reorderable()
                            ->defaultItems(0)
                            ->maxItems(20)
                            ->grid(['default' => 2, 'md' => 4, 'xl' => 6])
                            ->addActionLabel(__('Ajouter une image'))
                            ->schema([
                                FileUpload::make('image')
                                    ->image()
                                    ->required()
                                    ->label(false)
                                    ->imagePreviewHeight('90')
                                    ->panelLayout('compact'),

                                Select::make('color_id')
                                    ->relationship('color', 'name')
                                    ->label(__('Couleur'))
                                    ->placeholder(__('Sélectionnez une couleur'))
                                    ->searchable(),
                            ]),
                    ]),

                    /* ---------------- TARIFS ---------------- */
                    Tab::make('Tarifs')->schema([
                        Toggle::make('is_dimensions')
                            ->live()
                            ->label('Avec le prix'),

                        Grid::make(4)->schema([
                            TextInput::make('price')
                                ->label('Prix')
                                ->prefix('MAD')
                                ->numeric()
                                ->visible(fn (Get $get): bool => (bool) $get('is_dimensions'))
                                ->required(fn (Get $get): bool => (bool) $get('is_dimensions')),

                            TextInput::make('old_price')
                                ->label('Ancien prix')
                                ->prefix('MAD')
                                ->numeric()
                                ->visible(fn (Get $get): bool => (bool) $get('is_dimensions')),
                        ]),

                        // CREATE: capped repeater
                        Repeater::make('dimensions')
                            ->visibleOn('create')
                            ->hidden(fn (Get $get): bool => (bool) $get('is_dimensions'))
                            ->label(false)
                            ->relationship()
                            ->maxItems(300)
                            ->defaultItems(0)
                            ->collapsed()
                            ->collapsible()
                            ->cloneable()
                            ->reorderable()
                            ->addActionLabel('Ajouter une dimension')
                            ->itemLabel(fn (array $state): ?string =>
                                ($state['code'] ?? '—') . ' · ' .
                                ($state['height'] ?? '?') . 'x' . ($state['width'] ?? '?') .
                                ' · ' . ($state['price'] ?? '?') . ' MAD')
                            ->columns(['default' => 2, 'md' => 4, 'xl' => 6])
                            ->columnSpanFull()
                            ->schema(DimensionFields::make()),

                        // EDIT: paginated dimensions table embedded in the tab
                        Livewire::make(
                            DimensionsRelationManager::class,
                            fn (Model $record, Page $livewire): array => [
                                'ownerRecord' => $record,
                                'pageClass'   => $livewire::class,
                            ],
                        )
                            ->key('dimensions-relation-manager')
                            ->visibleOn('edit')
                            ->hidden(fn (Get $get): bool => (bool) $get('is_dimensions'))
                            ->columnSpanFull(),
                    ]),

                    /* ---------------- PIÈCES ---------------- */
                    Tab::make('Pièces')->schema([
                        Repeater::make('piece')
                            ->relationship()
                            ->label(false)
                            ->defaultItems(0)
                            ->maxItems(50)
                            ->collapsed()
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                            ->grid(['default' => 1, 'md' => 3])
                            ->schema([
                                TextInput::make('title')
                                    ->label(__('Titre'))
                                    ->required()
                                    ->maxLength(255),

                                Textarea::make('description')
                                    ->label(__('Description'))
                                    ->rows(2)
                                    ->maxLength(255),

                                FileUpload::make('file')
                                    ->label(__('Fichier'))
                                    ->panelLayout('compact'),
                            ]),
                    ]),
                ]),

            /* ---------------- AUTRES ---------------- */
            Section::make()
                ->compact()
                ->columnSpanFull()
                ->columns(2)
                ->extraAttributes(['class' => 'compact-form'])
                ->schema([
                    KeyValue::make('options')
                        ->reorderable()
                        ->columnSpanFull(),

                    RichEditor::make('content')
                        ->label(__('Contenu'))
                        ->columnSpanFull(),

                    Select::make('colore')
                        ->label(__('Couleur'))
                        ->relationship('colors', 'name')
                        ->native(false)
                        ->multiple()
                        ->searchable()
                        ->preload()
                        ->createOptionForm(self::ColorForm())
                        ->createOptionModalHeading(__('Couleur'))
                        ->createOptionUsing(fn (array $data): int => Color::create($data)->getKey()),

                    Select::make('attributes')
                        ->label(__('Attributs'))
                        ->relationship('attributes', 'name')
                        ->native(false)
                        ->multiple()
                        ->searchable()
                        ->preload(),

                    TagsInput::make('tags')
                        ->label(__('Mots clés'))
                        ->placeholder(__('Mot-clé'))
                        ->separator(',')
                        ->splitKeys(['Tab', ','])
                        ->default(null),

                    Select::make('products')
                        ->label(__('Produits liés'))
                        ->relationship('products', 'name')
                        ->native(false)
                        ->multiple()
                        ->searchable(),
                ]),
        ]);
    }

    public static function ColorForm(): array
    {
        return [
            Section::make()
                ->compact()
                ->columns(2)
                ->schema([
                    TextInput::make('name')->label(__('Couleur'))->required()->maxLength(255),
                    TextInput::make('es_name')->label(__('Couleur en espagnol'))->maxLength(255)->default(null),
                    TextInput::make('code')->label(__('Code'))->maxLength(255)->default(null),

                    Toggle::make('status')
                        ->inline(false)
                        ->label(__('Visibilité'))
                        ->helperText('Rendre cette couleur visible pour tout le monde.')
                        ->default(true)
                        ->required(),

                    FileUpload::make('image')
                        ->label(false)
                        ->placeholder(__('Image de la couleur'))
                        ->avatar()
                        ->alignCenter()
                        ->image(),
                ]),
        ];
    }
}