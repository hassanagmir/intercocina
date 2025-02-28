<?php

namespace App\Http\Controllers;

use App\Http\Resources\ViewColorResource;
use App\Models\ViewColor;
use Illuminate\Http\Request;

class ViewColorController extends Controller
{
    
    public function index()
    {
        $colors = ViewColor::all();
        return ViewColorResource::collection($colors);
    }
}
