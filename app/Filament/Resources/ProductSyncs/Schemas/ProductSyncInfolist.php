<?php

namespace App\Filament\Resources\ProductSyncs\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Carbon;

class ProductSyncInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Informations générales')
                    ->icon('heroicon-o-information-circle')
                    ->columns(3)
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('status')
                            ->label('Statut')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'completed' => 'success',
                                'running'   => 'warning',
                                'failed'    => 'danger',
                                'pending'   => 'gray',
                                default     => 'info',
                            })
                            ->formatStateUsing(fn (string $state): string => match ($state) {
                                'completed' => '✓ Complété',
                                'running'   => '⟳ En cours',
                                'failed'    => '✗ Échoué',
                                'pending'   => '⏳ En attente',
                                default     => ucfirst($state),
                            }),

                        TextEntry::make('started_at')
                            ->label('Démarré le')
                            ->dateTime('d/m/Y H:i:s')
                            ->placeholder('-')
                            ->icon('heroicon-o-play-circle')
                            ->color('success'),

                        TextEntry::make('finished_at')
                            ->label('Terminé le')
                            ->dateTime('d/m/Y H:i:s')
                            ->placeholder('En cours...')
                            ->icon('heroicon-o-check-circle')
                            ->color('info'),

                        TextEntry::make('duration')
                            ->label('Durée totale')
                            ->icon('heroicon-o-clock')
                            ->color('gray')
                            ->getStateUsing(function ($record): string {
                                if (!$record->finished_at || !$record->started_at) {
                                    return 'En cours...';
                                }
                                $seconds = Carbon::parse($record->started_at)
                                    ->diffInSeconds(Carbon::parse($record->finished_at));
                                if ($seconds < 60) return "{$seconds}s";
                                $minutes = intdiv($seconds, 60);
                                $remaining = $seconds % 60;
                                return "{$minutes}m {$remaining}s";
                            }),

                        TextEntry::make('created_at')
                            ->label('Créé le')
                            ->dateTime('d/m/Y H:i')
                            ->placeholder('-')
                            ->icon('heroicon-o-calendar'),

                        TextEntry::make('updated_at')
                            ->label('Modifié le')
                            ->dateTime('d/m/Y H:i')
                            ->placeholder('-')
                            ->icon('heroicon-o-calendar-days'),
                    ]),

                Section::make('Résultats de synchronisation')
                    ->icon('heroicon-o-chart-bar')
                    ->columns(4)
                    ->schema([
                        TextEntry::make('total_products')
                            ->label('Total produits')
                            ->numeric(thousandsSeparator: ' ')
                            ->icon('heroicon-o-cube')
                            ->color('gray'),

                        TextEntry::make('created_count')
                            ->label('Créés')
                            ->numeric(thousandsSeparator: ' ')
                            ->icon('heroicon-o-plus-circle')
                            ->color('success'),

                        TextEntry::make('updated_count')
                            ->label('Mis à jour')
                            ->numeric(thousandsSeparator: ' ')
                            ->icon('heroicon-o-arrow-path')
                            ->color('info'),

                        TextEntry::make('unchanged_count')
                            ->label('Inchangés')
                            ->numeric(thousandsSeparator: ' ')
                            ->icon('heroicon-o-minus-circle')
                            ->color('gray'),

                        TextEntry::make('failed_count')
                            ->label('Échoués')
                            ->numeric(thousandsSeparator: ' ')
                            ->icon('heroicon-o-x-circle')
                            ->color(fn ($state) => $state > 0 ? 'danger' : 'gray'),

                        TextEntry::make('price_updates')
                            ->label('Màj prix')
                            ->numeric(thousandsSeparator: ' ')
                            ->icon('heroicon-o-currency-euro')
                            ->color('warning'),

                        TextEntry::make('stock_updates')
                            ->label('Màj stock')
                            ->numeric(thousandsSeparator: ' ')
                            ->icon('heroicon-o-archive-box')
                            ->color('warning'),
                    ])->columnSpanFull(),

                Section::make('Message')
                    ->icon('heroicon-o-chat-bubble-left-ellipsis')
                    ->schema([
                        TextEntry::make('message')
                            ->label('Détails du message')
                            ->placeholder('Aucun message disponible.')
                            ->columnSpanFull()
                            ->color(fn ($record) => $record?->status === 'failed' ? 'danger' : 'gray')
                            ->icon(fn ($record) => $record?->status === 'failed'
                                ? 'heroicon-o-exclamation-triangle'
                                : 'heroicon-o-information-circle'
                            ),
                    ])->columnSpanFull(),

            ]);
    }
}