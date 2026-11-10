<?php
namespace App\Filament\Resources\Orders\Pages;

use App\Enums\OrderStatusEnum;
use App\Filament\Resources\Orders\OrderResource;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Enums\IconSize;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    protected string $view = 'filament.view-order';

    public function notify(string $text): void
    {
        Notification::make()
            ->title($text)
            ->success()
            ->send();
    }

    public function getTitle(): Htmlable
    {
        return new HtmlString(
            '<span class="text-xl">'
            . e($this->getRecordTitle())
            . '</span>'
        );
    }

    protected function updateOrderStatus(
        OrderStatusEnum $status,
        string $message
    ): void {
        $record = $this->getRecord();

        $record->status = $status;
        $record->save();

        $record->refresh();

        $this->notify($message);
    }

    protected function getHeaderActions(): array
    {
        return [
            ActionGroup::make([
                Action::make('confirmed')
                    ->label(__('Confirmé'))
                    ->action(function (): void {
                        $this->updateOrderStatus(
                            OrderStatusEnum::CONFIRMED,
                            'Commande confirmée'
                        );
                    })
                    ->requiresConfirmation()
                    ->color('info')
                    ->icon('heroicon-o-check-circle'),

                Action::make('preparation')
                    ->label(__('Préparation'))
                    ->action(function (): void {
                        $this->updateOrderStatus(
                            OrderStatusEnum::PREPARATION,
                            'Commande en préparation'
                        );
                    })
                    ->requiresConfirmation()
                    ->color('warning')
                    ->icon('heroicon-o-arrow-path'),

                Action::make('ready')
                    ->label(__('Prêt'))
                    ->action(function (): void {
                        $this->updateOrderStatus(
                            OrderStatusEnum::READY,
                            'Commande prête'
                        );
                    })
                    ->requiresConfirmation()
                    ->color('success')
                    ->icon('heroicon-o-bell-alert'),

                Action::make('canceled')
                    ->label(__('Annulé'))
                    ->action(function (): void {
                        $this->updateOrderStatus(
                            OrderStatusEnum::CANCELED,
                            'Commande annulée'
                        );
                    })
                    ->requiresConfirmation()
                    ->color('danger')
                    ->icon('heroicon-o-x-circle'),

            ])
                ->icon('heroicon-o-squares-2x2')
                ->iconSize(IconSize::Large)
                ->tooltip(__('État')),
        ];
    }
}
