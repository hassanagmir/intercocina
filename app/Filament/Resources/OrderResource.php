<?php

namespace App\Filament\Resources;

use App\Enums\OrderStatusEnum;
use App\Filament\Exports\OrderExporter;
use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Dimension;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Support\Enums\IconSize;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationGroup = "Porduits";

    public static function getNavigationBadge(): ?string
    {
        return parent::getEloquentQuery()->where('status', 1)->count();
    }

    public static function getEloquentQuery(): Builder
    {
        return Order::query()->latest();
    }

    public static function getModelLabel(): string
    {
        return __("Commande");
    }

    protected static ?string $recordTitleAttribute = "code";

    public static function getGloballySearchableAttributes(): array
    {
        return ['code'];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\Repeater::make('items')
                            ->afterStateUpdated(function (Set $set, Get $get) {
                                $items = $get('items') ?? [];
                                $total_amount = array_sum(array_column($items, 'total'));
                                $set('total_amount', $total_amount);
                            })
                            ->live()
                            ->relationship()
                            ->schema([
                                Forms\Components\Select::make('product_id')
                                    ->relationship('product', 'name')
                                    ->label(__("Produit"))
                                    ->searchable()
                                    ->preload()
                                    ->required()
                                    ->placeholder("__")
                                    ->live()
                                    ->afterStateUpdated(function (Set $set, Get $get) {
                                        $productId = $get('product_id');
                                        
                                        // Eager load product with dimensions
                                        $product = Product::with('dimensions')->find($productId);
                                        
                                        if ($product && $product->price) {
                                            $set("price", $product->price);
                                            $set("total", intval($get("quantity")) * $product->price);
                                        } else {
                                            $set("price", 0);
                                            $dimensionId = $get('dimension_id');
                                            if ($dimensionId && $product?->dimensions) {
                                                $dimension = $product->dimensions->find($dimensionId);
                                                if ($dimension) {
                                                    $set("total", intval($get("quantity")) * intval($dimension->price));
                                                }
                                            }
                                        }
                                    }),
    
                                Forms\Components\TextInput::make('price')
                                    ->hidden(function (Get $get, Set $set) {
                                        static $products = [];
                                        
                                        $productId = $get("product_id");
                                        if (!$productId) return false;
                                        
                                        if (!isset($products[$productId])) {
                                            $products[$productId] = Product::find($productId);
                                        }
                                        
                                        $product = $products[$productId];
                                        if ($product?->price) {
                                            $set("price", $product->price);
                                            return false;
                                        }
                                        return true;
                                    })
                                    ->live()
                                    ->label(__("Prix"))
                                    ->numeric(),
    
                                Forms\Components\Select::make('dimension_id')
                                    ->relationship('dimension', 'dimension', function($query) {
                                        return $query->whereNotNull("dimension")->with('prices');
                                    })
                                    ->afterStateUpdated(function (Set $set, Get $get) {
                                        static $dimensions = [];
                                        
                                        $dimensionId = $get('dimension_id');
                                        $quantity = intval($get('quantity'));
                                        
                                        if ($dimensionId && $quantity) {
                                            if (!isset($dimensions[$dimensionId])) {
                                                $dimensions[$dimensionId] = Dimension::with('prices')->find($dimensionId);
                                            }
                                            
                                            $dimension = $dimensions[$dimensionId];
                                            if ($dimension) {
                                                $set('total', $quantity * intval($dimension->price));
                                            }
                                        } else {
                                            $set('total', 0);
                                        }
                                    })
                                    ->searchable()
                                    ->preload()
                                    ->live()
                                    ->hidden(function (Get $get) {
                                        static $products = [];
                                        
                                        $productId = $get("product_id");
                                        if (!$productId) return false;
                                        
                                        if (!isset($products[$productId])) {
                                            $products[$productId] = Product::find($productId);
                                        }
                                        
                                        return $products[$productId]?->price ? true : false;
                                    })
                                    ->required(),
    
                                Forms\Components\Select::make('color_id')
                                    ->label(__("Couleur"))
                                    ->relationship('color', 'name')
                                    ->searchable()
                                    ->preload(),
    
                                Forms\Components\TextInput::make('quantity')
                                    ->live()
                                    ->afterStateUpdated(function (Set $set, Get $get) {
                                        static $products = [];
                                        static $dimensions = [];
                                        
                                        $quantity = intval($get("quantity"));
                                        
                                        if ($get('price')) {
                                            $productId = $get('product_id');
                                            if (!isset($products[$productId])) {
                                                $products[$productId] = Product::find($productId);
                                            }
                                            
                                            $product = $products[$productId];
                                            if ($product?->price) {
                                                $set("total", $quantity * $product->price);
                                            }
                                        } elseif ($dimensionId = $get('dimension_id')) {
                                            if (!isset($dimensions[$dimensionId])) {
                                                $dimensions[$dimensionId] = Dimension::find($dimensionId);
                                            }
                                            
                                            $dimension = $dimensions[$dimensionId];
                                            if ($dimension) {
                                                $set('total', $quantity * intval($dimension->price));
                                            }
                                        } else {
                                            $set('total', 0);
                                        }
    
                                        // Update total amount
                                        $items = $get('../../items') ?? [];
                                        $total_amount = array_sum(array_column($items, 'total'));
                                        $set('../../total_amount', $total_amount);
                                    })
                                    ->required()
                                    ->numeric(),
    
                                Forms\Components\TextInput::make('total')
                                    ->live()
                                    ->prefix("MAD")
                                    ->required()
                                    ->numeric(),
                            ])
                            ->columnSpan(2)
                            ->label(false)
                            ->columns(2),
    
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\Select::make('user_id')
                                    ->label(__("Client"))
                                    ->options(
                                        User::query()
                                            ->whereNotNull('name')
                                            ->select(['id', 'name'])
                                            ->get()
                                            ->pluck('name', 'id')
                                    )
                                    ->required(),
                                    
                                Forms\Components\TextInput::make('code')
                                    ->label(__("Code"))
                                    ->required()
                                    ->maxLength(255),
                                    
                                Forms\Components\Select::make('shipping_id')
                                    ->relationship('shipping', 'name')
                                    ->searchable()
                                    ->label(__("Expédition"))
                                    ->preload(),
                                    
                                Forms\Components\Select::make('status')
                                    ->label(__("État"))
                                    ->native(false)
                                    ->options(OrderStatusEnum::toArray())
                                    ->required(),
                                    
                                Forms\Components\TextInput::make('total_amount')
                                    ->label(__("Montant total"))
                                    ->live()
                                    ->prefix("MAD")
                                    ->required()
                                    ->numeric(),
                            ])
                            ->columnSpan(1)
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user')
                    ->state(function (Model $model) {
                        if ($model->user->code || $model->user->name) {
                            return ucwords($model->user->name . $model->user->code ?  " (". $model->user->code . ")" : "");
                        }elseif ($model->user->full_name) {
                            return ucwords($model->user->full_name);
                        }
                        return $model->user->email;
                    })
                    ->placeholder("__")
                    ->label(__("Client"))
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('items_count')->counts('items')
                    ->badge()
                    ->label(__("Produits")),

                Tables\Columns\TextColumn::make('total_amount')
                    ->badge()
                    ->suffix(" MAD")
                    ->label(__("Montant total"))
                    ->numeric()
                    ->sortable(),

                Tables\Columns\SelectColumn::make('status')
                    ->placeholder("__")
                    ->label(__("Modifier l'état"))
                    ->options(OrderStatusEnum::class),

                Tables\Columns\TextColumn::make('view_status')
                    ->state(function (Model $model) {
                        return $model->status;
                    })
                    ->placeholder("État")
                    ->label(__("État")),


                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("Crée le"))
                    ->since()
                    ->sortable(),

               

                Tables\Columns\TextColumn::make('created_at')
                    ->state(function (Model $model) {
                        return $model->created_at->format('d/m/Y - h:m A');
                    })
                    ->label(__("Crée le")),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('export')
                    ->url(fn (Order $record): string => route('order.export', $record->id))
                    ->iconSize(IconSize::Medium)
                    ->icon('heroicon-m-arrow-up-tray')
                    ->label(false)
                    ->tooltip(__("Export")),
                Tables\Actions\ViewAction::make()
                    ->iconSize(IconSize::Medium)
                    ->label(false)
                    ->tooltip(__("Voir")),
                Tables\Actions\EditAction::make()
                    ->iconSize(IconSize::Medium)
                    ->label(false)
                    ->tooltip(__("Editer")),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    // ->icon('heroicons-o-trash'),
                    Tables\Actions\ExportBulkAction::make()
                        ->exporter(OrderExporter::class)
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
            'view' => Pages\ViewOrder::route('/{record}/view'),
        ];
    }
}
