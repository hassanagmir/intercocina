<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ReviewsList extends Component
{


    public Product $product;

    public function mount(){

    }


    public function render()
    {
        return view('livewire.reviews-list');
    }
}
