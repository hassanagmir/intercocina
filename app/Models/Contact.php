<?php

namespace App\Models;

use App\Enums\ContactStatusEnum;
use App\Observers\ContactObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

// #[ObservedBy([ContactObserver::class])]
class Contact extends Model
{
    use HasFactory, LogsActivity;

    protected $casts = [
        'status' =>  ContactStatusEnum::class
    ];

    protected $fillable = [
        'full_name', 'phone', 'email', 'message', 'status', 'subject'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['full_name', 'phone', 'email', 'subject', "message"]);
    }
}
