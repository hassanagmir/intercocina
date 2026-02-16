<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'product_id',
        'image',

    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function images()
    {
        return $this->hasMany(ViewImage::class);
    }
}
