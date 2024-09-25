<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Image extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        "image", "product_id", "order"
    ];


    // Relations
    public function product(){
        return $this->belongsTo(Product::class);
    }


    public function getActivityLogOptions() : LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['image', 'product_id', 'order']);
    }
}
