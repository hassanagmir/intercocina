<?php

namespace App\Filament\Resources\Orders\Schemas;

use App\Enums\OrderPayment;
use App\Enums\OrderStatus;
use App\Enums\OrderStatusEnum;
use Filament\Infolists\Components\RepeatableEntry;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Order Details')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('code')
                            ->label('Order Code')
                            ->copyable(),

                        TextEntry::make('type')
                            ->label('Order Type')
                            ->placeholder('-'),

                        TextEntry::make('status')
                            ->label('Status')
                            ->badge()
                            ->color(fn (OrderStatusEnum $state) => $state->getColor())
                            ->formatStateUsing(fn (OrderStatusEnum $state) => $state->getLabel()),

                        // TextEntry::make('payment')
                        //     ->label('Payment Method')
                        //     ->badge()
                        //     ->color(fn (OrderPayment $state) => $state->getColor())
                        //     ->formatStateUsing(fn (OrderPayment $state) => $state->getLabel()),

                        TextEntry::make('total_amount')
                            ->label('Total Amount')
                            ->money('USD'),
                    ]),

                Section::make('Customer & Delivery')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('user.name')
                            ->label('Customer'),

                        TextEntry::make('shipping.name')
                            ->label('Shipping Method')
                            ->placeholder('-'),

                        TextEntry::make('address.full_address')
                            ->label('Delivery Address')
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ]),

                Section::make('Products')
                    ->schema([
                        RepeatableEntry::make('products')
                            ->label('Order Items')
                            ->columns(4)
                            ->schema([
                                TextEntry::make('name')
                                    ->label('Product'),

                                TextEntry::make('pivot.quantity')
                                    ->label('Quantity')
                                    ->numeric(),

                                TextEntry::make('pivot.price')
                                    ->label('Unit Price')
                                    ->money('USD'),

                                TextEntry::make('pivot.subtotal')
                                    ->label('Subtotal')
                                    ->money('USD'),
                            ]),
                    ]),

                Section::make('Timestamps')
                    ->columns(2)
                    ->schema([
                        TextEntry::make('created_at')
                            ->label('Created At')
                            ->dateTime()
                            ->placeholder('-'),

                        TextEntry::make('updated_at')
                            ->label('Updated At')
                            ->dateTime()
                            ->placeholder('-'),
                    ]),
            ]);
    }
}