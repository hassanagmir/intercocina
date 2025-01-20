<?php

namespace App\Livewire;

use App\Models\Color;
use App\Models\Dimension;
use App\Models\Discount;
use App\Models\Product as ProductModel;
use App\Models\Review;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Product extends Component
{
    public ProductModel $product;

    public $qty = 1;
    public $total = 0;

    public $ref;

    #[Validate('numeric')]
    public $color;
    #[Validate('numeric')]
    public $attribute;
    public $dimension;
    public $price;


    public $heights = [];
    public $widths = [];

   
    public $height;
    public $width;

 

    public $color_error;
    public $dimension_error;

    public $averageRating = 0;


    public $special_height;
    public $special_width;
    public $special_price;

    public $special;



    public function updatedSpecialWidth()
    {

        $dimension = $this->product->dimensions()
            ->where('width', '>=', intval($this->special_width))
            ->where('height', '>=', intval($this->special_height))
            ->orderBy('width', 'asc') // Adjust order as needed
            ->orderBy('height', 'asc')
            ->first();
        
        if ($dimension) {
            $this->special_price = $dimension->price;
        } else {
            $this->dimension_error = "La dimension {$this->special_width} x {$this->special_height} n'est pas disponible";
        }
    
        return;

        $dimension = $this->product->dimensions()->first();
    
        if($dimension && $this->special_height && $this->special_width){
            $originalHeight = $dimension->height;
            $originalWidth = $dimension->width;
            $originalPrice = $dimension->price;
    
            $newHeight = $this->special_height;
            $newWidth = $this->special_width;
    
            $newPrice = $originalPrice * (($newHeight * $newWidth) / ($originalHeight * $originalWidth));
    
            $this->special_price = $newPrice;
        }
    }

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
        $this->heights = array_unique(
            $this->product->dimensions()
                ->where("status", true)
                ->whereNotNull('height')
                ->where("price", ">", 0)
                ->pluck('height')->toArray()
        );
        $this->widths = array_unique(
            $this->product->dimensions()
                ->where("status", true)
                ->where("price", ">", 0)
                ->whereNotNull('width')
                ->pluck('width')->toArray()
        );

        $this->total = \Cart::getTotal();
        $this->price =  $this->product->price();

        $this->averageRating = $this->getAvgRating();

        // Get Ref
        if ($this->product->code) {
            $this->ref = $this->product->code;
        }


        // Attributes manager
        if (count($this->product->attributes)) {
            $this->attribute = $this->product->attributes->first()->id;

            if ($this->attribute) {

                $this->heights = array_unique($this->product->dimensions()
                    ->where('attribute_id', $this->attribute)
                    ->pluck('height')
                    ->toArray());

                $this->widths = array_unique($this->product->dimensions()
                    ->where('attribute_id', $this->attribute)
                    ->pluck('width')
                    ->toArray());
            }
        }
    }



    public function dimensionChanaged()
    {
        // Get dimension ref 
        if($this->dimension){
            $this->ref = $this->dimension->code;
        }
        
        if($this->dimension && !($this->dimension == 'Choisir un dimension')){
            $dimension = Dimension::find($this->dimension);
            $this->price = $dimension->price;
            
            if($this->price == 0){
                $this->dimension_error = "La dimension {$this->width} x {$this->height} n'est pas disponible";
            }
        }else{
            $this->price = 0;
        }
    }


    public function updated($property)
    {

        // dd($this->special);
        // $this->updateSpecialWidth();
        // Change dimensions if the attribute changed
        if (count($this->product->attributes)) {
            $this->heights = array_unique($this->product->dimensions()
                ->where('attribute_id', $this->attribute)
                ->where("status", true)
                ->whereNotNull('height')
                ->where("price", ">", 0)
                ->pluck('height')
                ->toArray());
    
            $this->widths = array_unique($this->product->dimensions()
                ->where("status", true)
                ->where("price", ">", 0)
                ->whereNotNull('width')
                ->where('attribute_id', $this->attribute)
                ->pluck('width')
                ->toArray());
        }

        if($this->width && $this->height){
            if (!$this->width || !$this->height) return;

            $query = $this->product->dimensions
                ->where('height', $this->height)
                ->where('width', $this->width);
        }

        if(!$this->width){
            $query = $this->product->dimensions
                ->whereNull('width')
                ->where('height', $this->height);
        }

        

        if ($this->product->colors && $this->color) {
            $query = $query->where('color_id', $this->color);
        }

      


        if(isset($query)){
            $dimension = $query->first();

            if ($dimension) {
                $this->dimension = $dimension;
                $this->price = $dimension->price;
                $this->reset("dimension_error");
            } elseif($this->width && $this->height) {
                $this->dimension = null;
                $this->dimension_error = "La dimension {$this->width} x {$this->height} n'est pas disponible";
            }
        }
    }


    public function specailCart(){
        $color = $this->color ? $this->color : null;

        if ($this->dimension) {
            $discount = Discount::where("category_id", $this->dimension->product->type->category->id)->where('user_id', auth()->id())->first()->percentage ?? 0;
        } else{
            $discount = Discount::where("category_id", $this->product->type->category->id)->where('user_id', auth()->id())->first()->percentage ?? 0;
        }

        $dimension = $this->product->dimensions;
        

        // Prepare cart item data
        $cartItemId = ($this->dimension ? $this->dimension->id : $this->product->id) . "-" . $color;
        $colorDetails = $color ? Color::find($color) : null;

        \Cart::add([
            'id' => $cartItemId,
            'name' => $this->product->name,
            'price' => $this->special_price - (($discount / 100) * $this->special_price),
            'quantity' => $this->qty,
            'attributes' => [
                'color' => intval($color),
                'color_name' => $colorDetails?->name,
                'image' => $this->product->images?->first()?->image,
                'dimension' => $this->special_height. "*" . $this->special_width,
                'slug' => $this->product->slug,
                'attribute' => "Spéciale",
                'product_id' => $this->product->id,
                'dimension_id' => null,
            ]
        ]);

        $this->qty = 1;
        $this->reset("color");
        $this->reset("width");
        $this->reset("height");
        $this->dispatch('add-to-cart');
    }
        

    public function add()
    {

        // Color validation
        if ($this->product->colors->count() && $this->color == "") {
            $this->color_error = "Obligatoire de sélectionner une couleur";
            return;
        } else {
            $this->color_error = false;
        }


        if ($this->special) {
            $this->validate([
                'special_height' => 'required|numeric|max:2800|min:70',
                'special_width' => 'required|numeric|max:2100|min:70',
            ]);

            $this->specailCart();
            return;
        }

        // $rules = [
        //     'qty' => 'required|numeric',
        //     'height' => ['required_if:product.price,null'],
        //     'width' => ['required_if:product.price,null'],
        // ];

        // $messages = [
        //     'qty.numeric' => __('La quantité doit être un nombre.'),
        //     'height.required_if' => __("La hauteur du produit est requise"),
        //     'width.required_if' => __("La largeur du produit est requise"),
        // ];

        // $this->validate($rules, $messages);

        if ($this->dimension) {
            $price = $this->dimension->price;
            $discount = Discount::where("category_id", $this->dimension->product->type->category->id)->where('user_id', auth()->id())->first()->percentage ?? 0;
        } elseif ($this->product->price) {
            $price = $this->product->price;
            $discount = Discount::where("category_id", $this->product->type->category->id)->where('user_id', auth()->id())->first()->percentage ?? 0;
        } else {
            $this->dimension_error = "La dimension " . $this->width . " x " . $this->height . " n'est pas disponible";
            return;
        }

        $color = $this->color ? $this->color : null;

        // Generate dimensions
        $dimension = '';
        if ($this->dimension) {
            $weight = $this->dimension->weight ? " - {$this->dimension->weight} {$this->dimension->weight_unit?->getLabel()}" : '';
            $dimension = ($this->dimension->width 
                ? $this->dimension->width 
                : $this->dimension->height) . ($this->dimension->height_unit?->getLabel() ?? '') . $weight;
        }
        // Prepare cart item data
        $cartItemId = ($this->dimension ? $this->dimension->id : $this->product->id) . "-" . $color;
        $colorDetails = $color ? Color::find($color) : null;

        \Cart::add([
            'id' => $cartItemId,
            'name' => $this->product->name,
            'price' => $price - (($discount / 100) * $price),
            'quantity' => $this->qty,
            'attributes' => [
                'color' => intval($color),
                'color_name' => $colorDetails?->name,
                'image' => $this->product->images?->first()?->image,
                'dimension' => $this->dimension ? $this->dimension->dimension : false,
                'slug' => $this->product->slug,
                'attribute' => $this->dimension ? $this->dimension?->attribute?->name : false,
                'product_id' => $this->product->id,
                'dimension_id' => $this->dimension?->id,
            ]
        ]);
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
