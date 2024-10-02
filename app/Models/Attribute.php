<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category', 'discription'];


    public function dimensions(){
        return $this->hasMany(Dimension::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'product_attributes');
    }

}
