<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name', 'email', 'stars', 'product_id', 'status', 'comment'
    ];

    // Relationships
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
