<?php

namespace App\Observers;

use App\Models\Contact;
use App\Models\User;
use App\Notifications\ContactNotification;

class ContactObserver
{
    /**
     * Handle the Contact "created" event.
     */
    public function created(Contact $contact): void
    {
        $admins = User::role('super_admin')->get();
        foreach($admins as $admin){

            // Email notificationa
            $admin->notify(new ContactNotification($contact));

        }
    }

    /**
     * Handle the Contact "updated" event.
     */
    public function updated(Contact $contact): void
    {
        //
    }

    /**
     * Handle the Contact "deleted" event.
     */
    public function deleted(Contact $contact): void
    {
        //
    }

    /**
     * Handle the Contact "restored" event.
     */
    public function restored(Contact $contact): void
    {
        //
    }

    /**
     * Handle the Contact "force deleted" event.
     */
    public function forceDeleted(Contact $contact): void
    {
        //
    }
}
