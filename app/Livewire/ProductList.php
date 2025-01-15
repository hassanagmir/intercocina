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
        $this->total_products = Product::count();

        if (empty($this->type)) {
            $firstType = $this->category->types()
                ->where("status", true)
                ->orderBy('order')
                ->first();

            $this->type = $firstType ? $firstType->slug : null;
        }
    }

    public function loadMore()
    {
        $this->amount += 8;
    }

    public function changeType($slug)
    {
        $this->type = $slug;
        $this->resetPage();
    }

    public function render()
    {
        if (empty($this->type)) {
            $products = collect([]);
        } else {
            $type = Type::where('slug', $this->type)
                ->with(['products' => function($query) {
                    $query->whereNot("status", 2)
                          ->with(['images' => function($q) {
                              $q->orderBy('order');
                          }, 'type.category']);
                        //   ->take($this->amount);
                }])
                ->orderBy('order')
                ->firstOrFail();

            $products = $type->products;
            $this->products_type = $type;
        }

        return view('livewire.product-list', [
            'products' => $products->sortBy('order'),
            'category' => $this->category,
            'title' => $this->category->name,
        ]);
    }
}