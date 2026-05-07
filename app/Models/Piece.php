<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    protected $fillable = ['title', 'description', 'file', 'product_id'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
