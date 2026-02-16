<?php

namespace App\Http\Controllers;

use App\Http\Resources\ViewColorResource;
use App\Models\ViewColor;
use Illuminate\Http\Request;

class ViewColorController extends Controller
{
    
public function index(Request $request)
{
    $perPage = $request->input('per_page');

    if ($perPage) {
        $colors = ViewColor::paginate($perPage);
        return ViewColorResource::collection($colors);
    }

    $colors = ViewColor::all();
    return ViewColorResource::collection($colors);
}
}
