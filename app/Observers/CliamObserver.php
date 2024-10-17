<?php

namespace App\Observers;

use App\Models\Reclamation;
use App\Models\User;
use App\Notifications\ClaimNotification;

class CliamObserver
{
    /**
     * Handle the Reclamation "created" event.
     */
    public function created(Reclamation $reclamation): void
    {
        $admins = User::role(['super_admin', 'commercial', 'directeur_commercial'])->get();
        foreach($admins as $admin){
            $admin->notify(new ClaimNotification($reclamation));
        }
    }

    /**
     * Handle the Reclamation "updated" event.
     */
    public function updated(Reclamation $reclamation): void
    {
        //
    }

    /**
     * Handle the Reclamation "deleted" event.
     */
    public function deleted(Reclamation $reclamation): void
    {
        //
    }

    /**
     * Handle the Reclamation "restored" event.
     */
    public function restored(Reclamation $reclamation): void
    {
        //
    }

    /**
     * Handle the Reclamation "force deleted" event.
     */
    public function forceDeleted(Reclamation $reclamation): void
    {
        //
    }
}
