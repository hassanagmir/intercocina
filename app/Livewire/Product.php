<?php

namespace App\Livewire;

use App\Models\Dimension;
use App\Models\Product as ProductModel;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Product extends Component
{


    public ProductModel $product;

    #[Validate('required|numeric')]
    public $quantity = 1;
    public $total = 0;
    public $color = "";

    #[Validate('required')] 
    public $dimension;

    public function mount()
    {
        $this->total = \Cart::getTotal();
        // dd(\Cart::getContent());
    }


  

    public function add()
    {
        $rules = [
            'quantity' => 'required|numeric',
            'dimension' => ['required_if:product.price,null'],
        ];

        $messages = [
            'quantity.numeric' => __('La quantité doit être un nombre.'),
            'dimension.required_if' => __('Les dimensions du produit sont obligatoires'),
        ];
    
        $this->validate($rules, $messages);

        if(!$this->dimension){
            
            $price = $this->product->price;
            $dimension = false;
        }else{
            $dimension = Dimension::find(intval($this->dimension));
            $price = $dimension->price;
        }

        $color = $this->color ? $this->color : '';

        \Cart::add(array(
            'id' => ($this->dimension ? $this->dimension : $this->product->id) . $color,
            'name' => $this->product->name,
            'price' => $price,
            'quantity' => $this->quantity,
            'attributes' => [
                'color' => $color,
                'image' => $this->product->images->first()->image,
                'dimension' => $dimension ? $dimension->dimension : false,
            ]
        ));
        $this->dispatch('add-to-cart'); 
    }


    public function increment()
    {
        $this->quantity++;
    }

    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }


    public function render()
    {
        return view('livewire.product');
    }
}
