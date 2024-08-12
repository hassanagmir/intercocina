<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name', 'es_name', 'description', 'code', 'type_id', 'content', 'options', 'status', 'slug'
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

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')->withPivot('quantity', 'total', 'status');
    }
}
