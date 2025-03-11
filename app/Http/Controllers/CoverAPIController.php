<?php

namespace App\Http\Controllers;

use App\Models\Cover;
use Illuminate\Http\Request;

class CoverAPIController extends Controller
{
    public function index()
    {
        return response()->json(Cover::select('title', 'image', 'url', 'top', 'bottom')->get());
    }

}
