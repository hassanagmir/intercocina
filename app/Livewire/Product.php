<?php

namespace App\Livewire;

use App\Models\Color;
use App\Models\Dimension;
use App\Models\Product as ProductModel;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Product extends Component
{


    public ProductModel $product;

    public $quantity = 1;
    public $total = 0;

    #[Validate('numeric')]
    public $color;
    public $dimension;
    public $price;

    public $color_error;

    public function mount()
    {
        $this->total = \Cart::getTotal();
        $this->price =  $this->product->price();
    }



    public function dimensionChanaged()
    {
        if($this->dimension && !($this->dimension == 'Choisir un dimension')){
            $this->price = Dimension::find($this->dimension)->price;
        }else{
            $this->price = 0;
        }
    }


    public function add()
    {

        if($this->product->colors->count() && $this->color == ""){
            $this->color_error = "Obligatoire de sélectionner une couleur"; 
            return;
        }

        $rules = [
            'quantity' => 'required|numeric',
            'dimension' => ['required_if:product.price,null'],
            'color' => ['required_if:product.colors.count,>0'],
        ];

        $messages = [
            'quantity.numeric' => __('La quantité doit être un nombre.'),
            'dimension.required_if' => __('Les dimensions du produit sont obligatoires'),
        ];

        $this->validate($rules, $messages);

        if (!$this->dimension) {

            $price = $this->product->price;
            $dimension = false;
        } else {
            $dimension = Dimension::find(intval($this->dimension));
            $price = $dimension->price;
        }

        $color = $this->color ? $this->color : null;

        \Cart::add(array(
            'id' => ($this->dimension ? $this->dimension : $this->product->id) . "-". $color,
            'name' => $this->product->name,
            'price' => $price,
            'quantity' => $this->quantity,
            'attributes' => [
                'color' => intval($color),
                'color_name' => $color ? Color::find($color)->name : null,
                'image' => $this->product->images->first()->image,
                'dimension' => $dimension ? $dimension->dimension : false,
                'slug' => $this->product->slug,
                'product_id' => $this->product->id,
                'dimension_id' => $dimension ? $dimension->id : null,
            ]
        ));
        $this->dispatch('add-to-cart');

        $this->reset("color");
        $this->reset("dimension");
        $this->quantity = 1;
    }


    public function render()
    {
        return view('livewire.product');
    }
}
