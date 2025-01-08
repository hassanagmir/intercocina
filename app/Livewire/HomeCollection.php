<?php

namespace App\Livewire;

use App\Models\Collection;
use Livewire\Component;

class HomeCollection extends Component
{


    public function render()
    {
        $collections = Collection::latest()->limit(2)->get();
        return view('livewire.home-collection',  compact('collections'));
    }
}
