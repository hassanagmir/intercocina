<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    use HasFactory;

    protected $fillable = [
        'width', 'height', 'price', 'product_id', 'status', 'slug'
    ];

    // Relationships
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
