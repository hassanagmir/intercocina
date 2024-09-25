<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Review;
use Livewire\Component;

class RatingForm extends Component
{

    public Product $product;

    public $stars = 1;
    public $full_name = '';
    public $email = '';
    public $comment = '';

    protected $rules = [
        'stars' => 'required|integer|min:1|max:5',
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'comment' => 'required|string|min:10',
    ];

    public function submitForm()
    {
        $data = $this->validate();

        $full_data = array_merge($data, ["product_id" => $this->product->id]);

        Review::create($full_data);
        $this->reset(['stars', 'full_name', 'email', 'comment']);
        session()->flash('message', 'Avis soumis avec succès!');
    }


    public function render()
    {
        return view('livewire.rating-form');
    }
}
