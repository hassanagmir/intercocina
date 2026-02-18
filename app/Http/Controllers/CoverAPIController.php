<?php

namespace App\Http\Controllers;

use App\Models\Cover;
use Illuminate\Http\Request;

class CoverAPIController extends Controller
{
    public function index()
    {
        $cover = Cover::with(['color_views:id,name,code,image,product_id', 'colors:id,name,image,code,status'])
            ->where('is_public', 1)
            ->select('id', 'image', 'title', 'subtitle', 'price', 'is_new', 'description', 'url', 'old_price', 'is_public', 'is_main')->get();
        return response()->json($cover);
    }
}
