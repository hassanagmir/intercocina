<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Review;
use Livewire\Component;
use Livewire\WithPagination;

class ReviewsList extends Component
{
    use WithPagination;


    public Product $product;

    public function mount() {}


    public function render()
    {
        return view('livewire.reviews-list', [
            'reviews' => Review::where("product_id", $this->product->id)->latest()->paginate(14)
        ]);
    }
}
