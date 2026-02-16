<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Enums\OrderStatusEnum;
use App\Enums\PaymentEnum;
use App\Models\Dimension;
use App\Models\Product;
use App\Models\User;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)
                    ->schema([
                        Repeater::make('items')
                            ->afterStateUpdated(function (Set $set, Get $get) {
                                $items = $get('items') ?? [];
                                $total_amount = array_sum(array_column($items, 'total'));
                                $set('total_amount', $total_amount);
                            })
                            ->live()
                            ->relationship()
                            ->schema([
                                Select::make('product_id')
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

                                TextInput::make('price')
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

                                Select::make('dimension_id')
                                    ->relationship('dimension', 'dimension', function ($query) {
                                        return $query->whereNotNull("dimension");
                                    })
                                    ->afterStateUpdated(function (Set $set, Get $get) {
                                        static $dimensions = [];

                                        $dimensionId = $get('dimension_id');
                                        $quantity = intval($get('quantity'));

                                        if ($dimensionId && $quantity) {
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

                                Select::make('color_id')
                                    ->label(__("Couleur"))
                                    ->relationship('color', 'name')
                                    ->searchable()
                                    ->preload(),

                                TextInput::make('quantity')
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

                                TextInput::make('total')
                                    ->live()
                                    ->prefix("MAD")
                                    ->required()
                                    ->numeric(),
                            ])
                            ->columnSpan(2)
                            ->label(false)
                            ->columns(2),

                        Section::make()
                            ->schema([
                                Select::make('user_id')
                                    ->label(__("Client"))
                                    ->options(
                                        User::query()
                                            ->whereNotNull('name')
                                            ->select(['id', 'name'])
                                            ->get()
                                            ->pluck('name', 'id')
                                    )
                                    ->required(),

                                TextInput::make('code')
                                    ->label(__("Code"))
                                    ->required()
                                    ->maxLength(255),

                                Select::make('shipping_id')
                                    ->relationship('shipping', 'name')
                                    ->searchable()
                                    ->label(__("Expédition"))
                                    ->preload(),

                                Select::make('status')
                                    ->label(__("État"))
                                    ->native(false)
                                    ->options(OrderStatusEnum::toArray())
                                    ->required(),

                                TextInput::make('total_amount')
                                    ->label(__("Montant total"))
                                    ->live()
                                    ->prefix("MAD")
                                    ->required()
                                    ->numeric(),
                            ])
                            ->columnSpan(1)
                    ])->columnSpanFull()
            ]);
    }
}
