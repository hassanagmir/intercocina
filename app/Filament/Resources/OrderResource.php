<?php

namespace App\Filament\Resources;

use App\Enums\OrderStatusEnum;
use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Dimension;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
                                    ->searchable()
                                    ->preload()
                                    ->label(__("Produit"))
                                    ->live()
                                    ->required(),
                                Forms\Components\Select::make('dimension_id')
                                    ->relationship('dimension', 'width', function (Builder $query, Get $get) {
                                        return $query->where('product_id', $get('product_id'));
                                    })
                                    ->afterStateUpdated(function (Set $set, Get $get) {
                                        if ($get('dimension_id') && $get('quantity')) {
                                            $dimension = Dimension::find($get('dimension_id'));
                                            $set('total', intval($get('quantity')) * intval($dimension->price));
                                        } else {
                                            return 0;
                                        }
                                    })
                                    ->searchable()
                                    ->preload()
                                    ->live()
                                    ->required(),

                                Forms\Components\TextInput::make('color')
                                    ->maxLength(255)
                                    ->default(null),

                                Forms\Components\TextInput::make('quantity')
                                    ->live()
                                    ->afterStateUpdated(function (Set $set, Get $get) {
                                        if ($get('dimension_id') && $get('quantity')) {
                                            $dimension = Dimension::find($get('dimension_id'));
                                            $set('total', intval($get('quantity')) * intval($dimension->price));
                                        } else {
                                            return 0;
                                        }
                                    })
                                    ->required()
                                    ->numeric(),
                                Forms\Components\TextInput::make('total')
                                    ->readOnly()
                                    ->live()
                                    ->prefix("MAD")
                                    ->required()
                                    ->numeric(),

                                Forms\Components\Select::make('status')
                                    ->label(__("État"))
                                    ->native(false)
                                    ->options(OrderStatusEnum::toArray())
                                    ->required(),
                            ])
                            ->columnSpan(2)
                            ->label(false)
                            ->columns(2),


                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\Select::make('user_id')
                                    ->relationship('user', "first_name")
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                Forms\Components\TextInput::make('code')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('total_amount')
                                    ->live()
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
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\SelectColumn::make('status')
                    ->label(__("État"))
                    ->options(OrderStatusEnum::class),
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
        ];
    }
}
