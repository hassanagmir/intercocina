<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory, HasSlug;


    protected $fillable = [
        'name', 'image', 'description', 'tags', 'status', 'slug', 'order'
    ];

    protected $casts = [
        'tags' => 'array',
    ];


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->doNotGenerateSlugsOnUpdate()
            ->saveSlugsTo('slug');
    }

    // Relationships
    public function types()
    {
        return $this->hasMany(Type::class);
    }

  
}
