<?php

namespace App\Livewire;

use App\Enums\ProductStatusEnum;
use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class ProductSearch extends Component
{
    use WithPagination;

    #[Url(as: 'q')]
    public $search = '';
    public $perPage = 10;

    public function updatingSearch()
    {
        $this->resetPage();
    }



    public function render()
    {

        if($this->search != ''){
            $products = Product::whereNot("status", ProductStatusEnum::HIDE)->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhere('tags', 'like', '%' . $this->search . '%');
            })
            ->orderByRaw("
                CASE 
                    WHEN name LIKE ? THEN 1
                    WHEN description LIKE ? THEN 2
                    ELSE 3
                END
            ", ['%' . $this->search . '%', '%' . $this->search . '%'])
            ->paginate($this->perPage);
        }else{
            $products = [];
        }

        return view('livewire.product-search', compact('products'));
    }
}
