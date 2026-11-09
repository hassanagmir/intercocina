<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class CartCounter extends Component
{

    #[On('add-to-cart')] 
    #[On('remove-from-cart')]
    public function render()
    {
        return view('livewire.cart-counter');
    }
}
