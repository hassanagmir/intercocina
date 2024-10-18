<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class HomeCategory extends Component
{
    public function render()
    {
        return view('livewire.home-category', [
            'categories' => Category::paginate(10)
        ]);
    }
}
