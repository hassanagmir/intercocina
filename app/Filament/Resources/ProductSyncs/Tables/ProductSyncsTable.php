<?php

namespace App\Filament\Resources\ProductSyncs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;

class ProductSyncsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('started_at')
                    ->label('Démarré le')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->icon('heroicon-o-play-circle')
                    ->color('success'),

                TextColumn::make('finished_at')
                    ->label('Terminé le')
                    ->dateTime('d/m/Y H:i:s')
                    ->sortable()
                    ->icon('heroicon-o-check-circle')
                    ->color('info')
                    ->placeholder('En cours...'),

                TextColumn::make('duration')
                    ->label('Durée')
                    ->icon('heroicon-o-clock')
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
                    })
                    ->color('gray'),

                TextColumn::make('status')
                    ->label('Statut')
                    ->badge()
                    ->searchable()
                    ->sortable()
                    ->color(fn (string $state): string => match ($state) {
                        'completed'  => 'success',
                        'running'    => 'warning',
                        'failed'     => 'danger',
                        'pending'    => 'gray',
                        default      => 'info',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'completed'  => '✓ Complété',
                        'running'    => '⟳ En cours',
                        'failed'     => '✗ Échoué',
                        'pending'    => '⏳ En attente',
                        default      => ucfirst($state),
                    }),

                TextColumn::make('total_products')
                    ->label('Total produits')
                    ->numeric(thousandsSeparator: ' ')
                    ->sortable()
                    ->icon('heroicon-o-cube')
                    ->alignCenter(),

                TextColumn::make('created_count')
                    ->label('Créés')
                    ->numeric(thousandsSeparator: ' ')
                    ->sortable()
                    ->color('success')
                    ->icon('heroicon-o-plus-circle')
                    ->alignCenter(),

                TextColumn::make('updated_count')
                    ->label('Mis à jour')
                    ->numeric(thousandsSeparator: ' ')
                    ->sortable()
                    ->color('info')
                    ->icon('heroicon-o-arrow-path')
                    ->alignCenter(),

                TextColumn::make('unchanged_count')
                    ->label('Inchangés')
                    ->numeric(thousandsSeparator: ' ')
                    ->sortable()
                    ->color('gray')
                    ->icon('heroicon-o-minus-circle')
                    ->alignCenter(),

                TextColumn::make('failed_count')
                    ->label('Échoués')
                    ->numeric(thousandsSeparator: ' ')
                    ->sortable()
                    ->color(fn ($state) => $state > 0 ? 'danger' : 'gray')
                    ->icon('heroicon-o-x-circle')
                    ->alignCenter(),

                TextColumn::make('price_updates')
                    ->label('Màj prix')
                    ->numeric(thousandsSeparator: ' ')
                    ->sortable()
                    ->icon('heroicon-o-currency-euro')
                    ->color('warning')
                    ->alignCenter(),

                TextColumn::make('stock_updates')
                    ->label('Màj stock')
                    ->numeric(thousandsSeparator: ' ')
                    ->sortable()
                    ->icon('heroicon-o-archive-box')
                    ->color('warning')
                    ->alignCenter(),

                TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->label('Modifié le')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('started_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Statut')
                    ->options([
                        'completed' => '✓ Complété',
                        'running'   => '⟳ En cours',
                        'failed'    => '✗ Échoué',
                        'pending'   => '⏳ En attente',
                    ]),
            ])
            ->recordActions([
                ViewAction::make()->label('Voir'),
                EditAction::make()->label('Modifier'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()->label('Supprimer'),
                ]),
            ])
            ->striped()
            ->paginated([10, 25, 50, 100])
            ->poll('30s'); // Auto-refresh for active syncs
    }
}