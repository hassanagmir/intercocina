<?php

namespace App\Models;


use App\Enums\ProductStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory, HasSlug, LogsActivity;



    protected $fillable = [
        'name', 'es_name', 'description', 'code', 'type_id', 'content', 'options', 'tags', 'status', 'slug',
        'price', 'old_price', 'order', 'unit'
    ];

    protected $appends = ['price_format'];


    protected $casts = [
        'options' => 'array',
        'status' =>  ProductStatusEnum::class,
        // 'images' => 'array',
    ];



    public function getActivityLogOptions() : LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['name', 'id', 'description', 'code', 'content', 'tags',]);
    }


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    
    public function color()
    {
        return $this->hasOne(ViewColor::class);
    }


    // Relationships
    public function type()
    {
        return $this->belongsTo(Type::class);
    }


    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_colors')
            ->withPivot('price');
    }

    public function dimensions()
    {
        return $this->hasMany(Dimension::class);
    }


    public function reviews(){
        return $this->hasMany(Review::class, 'product_id', 'id');
    }


    public function price()
    {

        if ($this->price !== null) {
            return (string) $this->price;
        }

        $dimensions = $this->relationLoaded('dimensions') 
            ? $this->dimensions 
            : $this->load('dimensions')->dimensions;
    
        $prices = $dimensions
            ->where('status', true)
            ->where('price', '>', 0)
            ->pluck('price'); 
    
        if ($prices->isEmpty()) {
            return '0'; // Return string for consistency
        }
    
        $minPrice = $prices->min();
        $maxPrice = $prices->max();
    
        return $minPrice === $maxPrice 
            ? (string) $minPrice 
            : "{$minPrice} - {$maxPrice}";
    }


    
    public function getPriceFormatAttribute()
    {
        return $this->price();
    }



    public function images(){
        return $this->hasMany(Image::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
            ->withPivot('quantity', 'total', 'status');
    }


    public function attributes(){
        return $this->belongsToMany(Attribute::class, 'product_attributes');
    }

    public function related()
    {
        return $this->belongsToMany(Product::class, 'product_relation', 'product_id', 'related_id');
    }



}
