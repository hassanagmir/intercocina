<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Type;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    #[Url()]
    public $type = "";
    public $amount = 8;
    public $total_products = 0;

    public $products_type;

    public Category $category;




    public function mount()
    {
        $this->total_products = Product::all()->count();

        // dd($this->type);
        if($this->type == ""){
            $type = $this->category->types->first();
            if($type){
                $this->type = $this->category->types->first()->slug;
            }else{
                $this->type = null;
            }
        }        
    }

    public function loadMore()
    {
        $this->amount += 8;
    }

    public function changeType($slug){
        $this->type = $slug;
    }


    public function render()
    {

        if($this->type == ''){
            $type = Type::first();
            $products = [];
        }else{
            $type = Type::where('slug', $this->type)?->first();
            $products = $type?->products ?? [];
            $this->products_type = $type;
            
        }
        

        return view('livewire.product-list', [
            'products' => $products,
            'category' => $this->category
        ]);
    }
}
