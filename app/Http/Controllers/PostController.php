<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::paginate(20);
        $title = __("Blog");
        return view('post.list', compact('posts', 'title'));
    }

    public function show(Post $post){
        $title = $post->title;
        $description = $post->description;
        $image = $post->image;
        $tags = $post->tags;
        return view('post.show', compact('post', 'title', 'description', 'image', 'tags'));
    }
}
