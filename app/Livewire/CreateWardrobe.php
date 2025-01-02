<?php

namespace App\Livewire;

use App\Models\PanelColor;
use Livewire\Component;

class CreateWardrobe extends Component
{

    public $thickness;
    public $color;
    public $doorType;
    public $width;
    public $height;
    public $depth;


    public function render()
    {
        if ($this->thickness) {
            $colors = PanelColor::where('thickness', strval($this->thickness))->get();
        } else {
            $colors = PanelColor::all();
        }
        return view('livewire.create-wardrobe', compact('colors'));
    }
}
