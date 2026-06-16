<?php

namespace App\Models;

use App\Enums\ClaimStatusEnum;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\CliamObserver;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;



#[ObservedBy([CliamObserver::class])]
class Reclamation extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $casts = [
        'status' =>  ClaimStatusEnum::class,
    ];

    protected $fillable = [
        'client_number',
        'full_name',
        'subject',
        'phone',
        'message',
        'status'
    ];


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('attachments');
    }
}
