<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class CartModal extends Component
{

    public $quantity;


    public function delete($product_id){
        \Cart::remove($product_id);
        $this->dispatch('remove-from-cart');
    }


    public function quantityUpdated($id){
        // $quantity = \Cart::get($id)["quantity"];
        \Cart::update($id, array(
            'quantity' => $this->quantity
        ));
    }


    #[On('add-to-cart')] 
    public function render()
    {
        return view('livewire.cart-modal');
    }
}
