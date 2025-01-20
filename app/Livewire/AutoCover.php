<?php

namespace App\Livewire;

use App\Models\Cover;
use Livewire\Component;

class AutoCover extends Component
{
    public function render()
    {
        $covers = Cover::query()->where('bottom', true)->latest()->get();
        return view('livewire.auto-cover', compact('covers'));
    }
}
