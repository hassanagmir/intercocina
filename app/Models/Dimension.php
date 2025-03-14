<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use App\Enums\HeightUnitEnum;
use App\Enums\WeightUnitEnum;

class Dimension extends Model
{
    use HasFactory, HasSlug, LogsActivity;

    protected $fillable = [
        'width', 'height', 'price', 'product_id', 'status',
        'slug', 'code', 'image_id', 'dimension', 'color_id', 'attribute_id',
        'weight_unit', 'weight', 'thicknesse', 'height_unit', 'depth'
    ];

    protected $casts = [
        'height_unit' => WeightUnitEnum::class,
        'height_unit' => HeightUnitEnum::class,
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['width', 'height', 'thicknesse', 'weight', 'id'])
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

    public function color(){
        return $this->belongsTo(Color::class);
    }


    public function attribute(){
        return $this->belongsTo(Attribute::class);
    }


}
