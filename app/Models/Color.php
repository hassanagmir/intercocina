<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Color extends Model
{
    use HasFactory, HasSlug;

    
    protected $fillable = [
        'name', 'es_name', 'code', 'image', 'status', 'slug'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    // Relationships
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_colors')->withPivot('price');
    }
}