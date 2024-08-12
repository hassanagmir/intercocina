<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'content', 'image', 'tags', 'status', 'slug'
    ];

    // Relationships
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
