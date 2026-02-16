<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GroupType extends Pivot
{


    public function type()
    {
        return $this->belongsTo(\App\Models\Type::class);
    }
}
