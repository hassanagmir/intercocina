<?php

namespace App\Livewire;

use App\Models\Product as ProductModel;
use Livewire\Component;
use Cart;

class Product extends Component
{


    public ProductModel $product;

    public $quantity = 1;

    public function mount(){
        // \Cart::add(array(
        //     'id' => 456, // inique row ID
        //     'name' => 'Sample Item',
        //     'price' => 67.99,
        //     'quantity' => 4,
        //     'attributes' => array()
        // ));
        
    }


    public function add(){
        \Cart::add(array(
            'id' => 456, // inique row ID
            'name' => 'Sample Item',
            'price' => 67.99,
            'quantity' => 4,
            'attributes' => array()
        ));

        dd(\Cart::getTotal());
    }


    public function render()
    {
        return view('livewire.product');
    }
}
