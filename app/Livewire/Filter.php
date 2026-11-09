<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Filter extends Component
{

    public function render()
    {
        $categories = Category::with('types')->orderBy('order')->get();
        return view('livewire.filter', compact('categories'));
    }
}
