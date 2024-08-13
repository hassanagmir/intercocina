<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Type extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name', 'description', 'content', 'image', 'tags', 'status', 'slug', 'category_id'
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
        return $this->hasMany(Product::class);
    }


    public function category(){
        return $this->belongsTo(Category::class);
    }
}
