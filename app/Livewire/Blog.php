<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Blog extends Component
{
    public function render()
    {
        $posts = Post::latest()->take(3)->get();
        return view('livewire.blog', compact('posts'));
    }
}
