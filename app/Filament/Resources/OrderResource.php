<?php

namespace App\Filament\Resources;

use App\Enums\OrderStatusEnum;
use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Dimension;
use App\Models\Order;
use App\Models\Product;
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

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    protected static ?string $navigationGroup = "Porduits";

    public static function getNavigationBadge(): ?string
    {
        return parent::getEloquentQuery()->where('status', 1)->count();
    }

    public static function getModelLabel(): string
    {
        return __("Commande");
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Grid::make(3)
                    ->schema([

                        Forms\Components\Repeater::make('items')
                            ->afterStateUpdated(function (Set $set, Get $get) {
                                $items = $get('items');
                                $total_amount = 0;
                                foreach ($items as $item) {
                                    $total_amount += $item['total'];
                                }
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
                                    ->live()
                                    ->afterStateUpdated(function (Set $set, Get $get) {
                                        if ($get('product_id')) {
                                            $product = Product::find($get('product_id'));
                                            if ($product->price) {
                                                $set("total", (intval($get("quantity")) * $product->price));
                                                $set("price", $product->price);
                                            } else {
                                                $set("price", 0);
                                                if ($get('dimension_id') && $get('quantity')) {
                                                    $dimension = Dimension::find($get('dimension_id'));
                                                    $set('total', intval($get('quantity')) * intval($dimension->price));
                                                }
                                            }
                                        }
                                    }),


                                Forms\Components\TextInput::make('price')
                                    ->hidden(function (Get $get, Set $set) {
                                        if ($get("product_id")) {
                                            if (Product::find($get("product_id"))->price) {
                                                $set("price", Product::find($get("product_id"))->price);
                                                return false;
                                            } else {
                                                return true;
                                            }
                                        }
                                    })
                                    ->live()
                                    ->label(__("Prix"))
                                    ->numeric(),

                                Forms\Components\Select::make('dimension_id')
                                    ->relationship('dimension', 'width', function (Builder $query, Get $get) {
                                        return $query->where('product_id', $get('product_id'));
                                    })
                                    ->afterStateUpdated(function (Set $set, Get $get) {
                                        if ($get('dimension_id') && $get('quantity')) {
                                            $dimension = Dimension::find($get('dimension_id'));
                                            $set('total', intval($get('quantity')) * intval($dimension->price));
                                        } else {
                                            $set('total', 0);
                                        }
                                    })
                                    ->searchable()
                                    ->preload()
                                    ->live()
                                    ->hidden(function (Get $get) {
                                        if ($get("product_id")) {
                                            if (Product::find($get("product_id"))->price) {
                                                return true;
                                            } else {
                                                return false;
                                            }
                                        }
                                    })
                                    ->required(),

                                Forms\Components\Select::make('color_id')
                                    ->relationship('color', 'name')
                                    ->searchable()
                                    ->preload(),

                                Forms\Components\TextInput::make('quantity')
                                    ->live()
                                    ->afterStateUpdated(function (Set $set, Get $get) {
                                        if ($get('price')) {
                                            $product = Product::find($get('product_id'));
                                            if ($product->price) {
                                                $set("total", (intval($get("quantity")) * $product->price));
                                            }
                                        } elseif ($get('dimension_id') && $get('quantity')) {
                                            $dimension = Dimension::find($get('dimension_id'));
                                            $set('total', intval($get('quantity')) * intval($dimension->price));
                                        } else {
                                            $set('total', 0);
                                        }

                                        $items = $get('../../items');
                                        $total_amount = 0;
                                        foreach ($items as $item) {
                                            $total_amount += $item['total'];
                                        }
                                        $set('../../total_amount', $total_amount);
                                    })
                                    ->required()
                                    ->numeric(),


                                Forms\Components\TextInput::make('total')
                                    ->readOnly()
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
                                    ->label(__("Utilisateur"))
                                    ->relationship('user', "full_name")
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                Forms\Components\TextInput::make('code')
                                    ->label(__("Code"))
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('total_amount')
                                    ->label(__("Montant total"))
                                    ->live()
                                    ->readOnly()
                                    ->required()
                                    ->numeric(),
                                Forms\Components\Select::make('status')
                                    ->label(__("État"))
                                    ->native(false)
                                    ->options(OrderStatusEnum::toArray())
                                    ->required(),
                            ])->columnSpan(1)

                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user')
                    ->state(function(Model $model){
                        return $model->user->first_name . " " . $model->user->last_name;
                    })
                    ->label(__("Client"))
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('code')
                    ->label("Numéro")
                    ->searchable(),

                Tables\Columns\TextColumn::make('items_count')->counts('items')
                    ->badge()
                    ->label(__("Produits"))
                    ->searchable(),

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
                    ->state(function(Model $model){
                        return $model->status;
                    })
                    ->placeholder("État")
                    ->label(__("État")),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("Crée le"))
                    ->date()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->iconSize(IconSize::Medium)
                    ->label(false)
                    ->tooltip(__("Modifier")),
                Tables\Actions\ViewAction::make()
                    ->iconSize(IconSize::Medium)
                    ->label(false)
                    ->tooltip(__("Voir")),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
            'view' => Pages\ViewOrder::route('/{record}/view'),
        ];
    }
}
