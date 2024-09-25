<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasFactory, HasSlug;


    protected $fillable = [
        'name', 'image', 'description', 'tags', 'status', 'slug'
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'description', 'tags']);
    }

    

    protected static function boot()
    {
        parent::boot();
        static::created(function ($category) {
            $category->slug = Str::slug($category->name);
            $category->save();
        });
    }

    // Relationships
    public function types()
    {
        return $this->hasMany(Type::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
