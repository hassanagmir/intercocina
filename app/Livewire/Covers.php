<?php

namespace App\Livewire;

use App\Models\Cover;
use Livewire\Component;

class Covers extends Component
{
    public function render()
    {
        return view('livewire.covers', [
            'covers' => Cover::where('top', true)->latest()->paginate(10)
        ]);
    }
}
