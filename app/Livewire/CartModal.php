<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class CartModal extends Component
{


    public function delete($product_id){
        \Cart::remove($product_id);
        $this->dispatch('remove-from-cart');
    }


    #[On('add-to-cart')] 
    public function render()
    {
        return view('livewire.cart-modal');
    }
}
