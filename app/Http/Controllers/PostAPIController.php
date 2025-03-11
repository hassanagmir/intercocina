<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostAPIController extends Controller
{
    public function index()
    {
        return response()->json(Post::select('title', 'slug', 'image', 'description')->paginate(20));
    }

    public function list()
    {
        return response()->json(Post::select('title', 'slug', 'image', 'description')->paginate(3));
    }
    


    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        if ($post) {
            return response()->json($post);
        } else {
            return response()->json(['message' => 'post not found'], 404);
        }
    }
}
