<?php

namespace App\Models;

use App\Enums\ClaimStatusEnum;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\CliamObserver;

#[ObservedBy([CliamObserver::class])]
class Reclamation extends Model
{
    use HasFactory;

    protected $casts = [
        'status' =>  ClaimStatusEnum::class,
    ];

    protected $fillable = [
        'client_number', 'full_name', 'subject', 'phone', 'message', 'status'
    ];
}
