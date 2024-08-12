<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'color_id', 'brand_id', 'slug'
    ];

    // Relationships
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
