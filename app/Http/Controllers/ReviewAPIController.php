<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewAPIController extends Controller
{
    public function index()
    {
      $reviews = Review::where('status', 1)->take(10)->get();
       return response()->json($reviews);
    }
}
