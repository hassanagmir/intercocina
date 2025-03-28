<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'product_id', 'dimension_id', 'color_id',
        'quantity', 'total', 'special_height', 'special_width'
    ];

    // Relationships
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function dimension()
    {
        return $this->belongsTo(Dimension::class);
    }
}
