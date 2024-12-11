<?php

namespace App\Models;

use App\Enums\ClaimStatusEnum;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\CliamObserver;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

// #[ObservedBy([CliamObserver::class])]
class Reclamation extends Model
{
    use HasFactory, LogsActivity;

   

    protected $casts = [
        'status' =>  ClaimStatusEnum::class,
    ];


    protected $fillable = [
        'client_number', 'full_name', 'subject', 'phone', 'message', 'status'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            // ->setDescriptionForEvent(function(string $eventName) {
            //     $user = auth()->user();
            //     return "{$user->full_name} has {$eventName} project {$this->name}";
            // })
            ->dontSubmitEmptyLogs()
            ->logOnly(['full_name', 'phone', 'subject', "client_number"]);
    }
}
