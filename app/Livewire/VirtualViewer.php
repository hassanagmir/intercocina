<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;

class VirtualViewer extends Component
{
    #[Url(as: 'color')]
    public $color;

    public $image;

    public function mount()
    {
        $this->image = \App\Models\ViewImage::first()->first()->path;
    }

    public function changeColor($color)
    {
        $this->color = $color;
        $this->image = \App\Models\ViewImage::where('view_color_id', $color)->first()->path;
    }


    public function render()
    {
        $colors = \App\Models\ViewColor::all();
        return view('livewire.virtual-viewer', compact('colors'));
    }
}
