<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\User;
use App\Notifications\OrderNotification;
use Filament\Notifications\Notification;


class OrderObserver
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {

        $admins = User::role('super_admin')->get();
        foreach($admins as $admin){

            // Email notificationa
            $admin->notify(new OrderNotification($order));

            // Intercocina db notifications
            Notification::make()
                ->title('Saved successfully')
                ->sendToDatabase($admin);
        }

       
    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
