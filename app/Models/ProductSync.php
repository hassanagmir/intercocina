<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSync extends Model
{
    protected $fillable = [
        'started_at',
        'finished_at',

        'total_products',
        'created_count',
        'updated_count',
        'unchanged_count',
        'failed_count',

        'price_updates',
        'stock_updates',

        'status',
        'message',
    ];
}
