<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Dimension extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'width', 'height', 'price', 'product_id', 'status', 'slug'
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
}
