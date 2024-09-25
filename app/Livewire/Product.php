<?php

namespace App\Livewire;

use App\Models\Color;
use App\Models\Dimension;
use App\Models\Product as ProductModel;
use App\Models\Review;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Product extends Component
{


    public ProductModel $product;

    public $qty = 1;
    public $total = 0;

    #[Validate('numeric')]
    public $color;
    public $dimension;
    public $price;

    public $heights = [];
    public $widths = [];

   
    public $height;
    public $width;

    public $color_error;
    public $dimension_error;

    public $averageRating = 0;


    public function getAvgRating()
    {
        $totalReviews = Review::where("product_id", $this->product->id)->count();
        if ($totalReviews == 0) {
            return 0;
        }

        $totalStars = Review::where('product_id', $this->product->id)->sum('stars');

        return round($totalStars / $totalReviews, 2);
    }


    public function mount()
    {
        $this->heights = array_unique($this->product->dimensions->pluck('height')->toArray());
        $this->widths = array_unique($this->product->dimensions->pluck('width')->toArray());

        $this->total = \Cart::getTotal();
        $this->price =  $this->product->price();

        $this->averageRating = $this->getAvgRating();
    }



    public function dimensionChanaged()
    {
        if($this->dimension && !($this->dimension == 'Choisir un dimension')){
            $this->price = Dimension::find($this->dimension)->price;
        }else{
            $this->price = 0;
        }
    }


    public function updated($property)
    {
        if($this->width && $this->height){
            $dimension =  $this->product->dimensions->where('height', $this->height)->where('width', $this->width)->first();
            
            if($dimension){
                $this->dimension = $dimension;
                $this->price = $dimension->price;

                $this->reset("dimension_error");
            }else{
                $this->dimension = null;
                $this->dimension_error = "La dimension " . $this->width . " x " . $this->height . " n'est pas disponible";
            }
            
        }
    }





    public function add()
    {

        if($this->product->colors->count() && $this->color == ""){
            $this->color_error = "Obligatoire de sélectionner une couleur"; 
            return;
        }

        $rules = [
            'qty' => 'required|numeric',
            'height' => ['required_if:product.price,null'],
            'width' => ['required_if:product.price,null'],
        ];

        $messages = [
            'qty.numeric' => __('La quantité doit être un nombre.'),
            'height.required_if' => __("La hauteur du produit est requise"),
            'width.required_if' => __("La largeur du produit est requise"),
        ];

        $this->validate($rules, $messages);


        if ($this->dimension) {
            $price = $this->dimension->price;
        } elseif ($this->product->price) {
            $price = $this->product->price;
        } else {
            $this->dimension_error = "La dimension " . $this->width . " x " . $this->height . " n'est pas disponible";
            return;
        }

        $color = $this->color ? $this->color : null;

        \Cart::add(array(
            'id' => ($this->dimension ? $this->dimension->id : $this->product->id) . "-". $color,
            'name' => $this->product->name,
            'price' => $price,
            'quantity' => $this->qty,
            'attributes' => [
                'color' => intval($color),
                'color_name' => $color ? Color::find($color)->name : null,
                'image' => $this->product->images?->first()?->image,
                'dimension' => $this->dimension ? $this->dimension->dimension : false,
                'slug' => $this->product->slug,
                'product_id' => $this->product->id,
                'dimension_id' => $this->dimension ? $this->dimension->id : null,
            ]
        ));
        
        $this->qty = 1;
        $this->reset("color");
        $this->reset("width");
        $this->reset("height");
        $this->dispatch('add-to-cart');
       
    }


    public function render()
    {
        return view('livewire.product');
    }
}
