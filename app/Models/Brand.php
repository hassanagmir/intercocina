<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'logo', 'tags', 'status', 'slug'
    ];

    // Relationships
    public function colors()
    {
        return $this->hasMany(BrandColor::class);
    }
}
