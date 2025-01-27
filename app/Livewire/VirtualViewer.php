<?php

namespace App\Livewire;

use Livewire\Attributes\Url;
use Livewire\Component;

class VirtualViewer extends Component
{
    #[Url(as: 'color')]
    public $color;

    public $colors = [];

    public $image;

    public $query;

    public function mount()
    {
        $this->image = \App\Models\ViewImage::first()->first()->path;
        $this->colors = \App\Models\ViewColor::all();
    }

    public function changeColor($color)
    {
        $this->color = $color;
        $this->image = \App\Models\ViewImage::where('view_color_id', $color)->first()->path;
    }

    public function search()
    {
        $this->colors = \App\Models\ViewColor::where('name', "LIKE", "%$this->query%")
            ->orWhere('code', "LIKE", "%$this->query%")
            ->get();
    }

    public function clear()
    {
        $this->query = '';
        $this->colors = \App\Models\ViewColor::all();
    }


    public function render()
    {
        return view('livewire.virtual-viewer');
    }
}
