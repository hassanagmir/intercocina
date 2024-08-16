<?php

namespace App\Models;

use App\Enums\ProductStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory, HasSlug;


    protected $fillable = [
        'name', 'es_name', 'description', 'code', 'type_id', 'content', 'options', 'tags', 'status', 'slug',
        'price', 'old_price'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    protected $casts = [
        'options' => 'array',
        'status' =>  ProductStatusEnum::class,
    ];



    // Relationships
    public function type()
    {
        return $this->belongsTo(Type::class);
    }


    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_colors')->withPivot('price');
    }

    public function dimensions()
    {
        return $this->hasMany(Dimension::class);
    }


    public function images(){
        return $this->hasMany(Image::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')->withPivot('quantity', 'total', 'status');
    }
}
