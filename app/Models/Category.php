<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'image', 'description', 'tags', 'status', 'slug'
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    

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
}
