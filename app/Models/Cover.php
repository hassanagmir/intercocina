<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cover extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'url',
        'top',
        'bottom',
        'is_new',
        'subtitle',
        'price',
        'old_price',
        'description'
    ];


    public function colors()
    {
        return $this->belongsToMany(Color::class, 'cover_color');
    }


    public function color_views()
    {
        return $this->belongsToMany(ViewColor::class, 'cover_color_view');
    }
}
