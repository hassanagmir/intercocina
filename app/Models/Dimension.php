<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Dimension extends Model
{
    use HasFactory, HasSlug, LogsActivity;

    protected $fillable = [
        'width', 'height', 'price', 'product_id', 'status', 'slug', 'code', 'image_id', 'dimension'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['width', 'height'])
            ->saveSlugsTo('slug');
    }


    // Relationships
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getActivityLogOptions() : LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(["width", "height", "price", "product_id"]);
    }


}
