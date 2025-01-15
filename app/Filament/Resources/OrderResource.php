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
                                    ->placeholder("__")
                                    ->live()
                                    // ->getOptionLabelFromRecordUsing(fn ($state, $label) => false)
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
                                    ->relationship('dimension', 'dimension', fn($query) => $query->whereNotNull("dimension"))
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
                                    ->label(__("Couleur"))
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
                                    ->label(__("Client"))
                                    ->options(User::whereNotNull('name')->pluck('name', 'id'))
                                    ->required(),
                                Forms\Components\TextInput::make('code')
                                    ->label(__("Code"))
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Select::make('status')
                                    ->label(__("État"))
                                    ->native(false)
                                    ->options(OrderStatusEnum::toArray())
                                    ->required(),
                                Forms\Components\TextInput::make('total_amount')
                                    ->label(__("Montant total"))
                                    ->live()
                                    ->prefix("MAD")
                                    ->readOnly()
                                    ->required()
                                    ->numeric(),

                            ])->columnSpan(1)

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
            // 'edit' => Pages\EditOrder::route('/{record}/edit'),
            'view' => Pages\ViewOrder::route('/{record}/view'),
        ];
    }
}
