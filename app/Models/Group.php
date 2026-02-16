<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Group extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['name', 'description', 'content', 'image', 'is_public', 'order'];



    public function types()
    {
        return $this->belongsToMany(Type::class, 'group_type', 'group_id', 'type_id')
            ->withPivot('order')
            ->orderByPivot('order');
    }

    public function type()
    {
        return $this->belongsTo(\App\Models\Type::class);
    }

    public function groupTypes()
    {
        return $this->hasMany(GroupType::class)->orderBy('order');
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name', 'id')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
