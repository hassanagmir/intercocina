<?php

namespace App\Livewire;

use App\Enums\ProductStatusEnum;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class SearchModal extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    public function updatingSearch()
    {
        $this->resetPage();
    }



    public function render()
    {

        if($this->search != ''){
            $articles = Product::whereNot("status", ProductStatusEnum::HIDE)->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhere('code', strtoupper($this->search))
    
                    ->orWhereHas('dimensions', fn($query) => $query->where('code', strtoupper($this->search)))
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
            $articles = [];
        }


        
        return view('livewire.search-modal', compact("articles"));
    }
}
