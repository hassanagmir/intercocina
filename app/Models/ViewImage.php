<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path',
        'view_color_id',
    ];

    public function viewColor()
    {
        return $this->belongsTo(ViewColor::class);
    }
    
}
