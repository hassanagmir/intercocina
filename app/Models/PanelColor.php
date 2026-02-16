<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanelColor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'thickness',
        'image',
        'description',
        'code',
        'type',
    ];
}
