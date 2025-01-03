<?php

namespace App\Livewire;

use App\Models\PanelColor;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateWardrobe extends Component
{

    #[Validate('required|numeric|min:16|max:22')]
    public $thickness;

    #[Validate('required|numeric')]
    public $color;

    #[Validate('required')]
    public $doorType;

    #[Validate('required|numeric|max:500|min:60')]
    public $width;

    #[Validate('required|numeric|max:300|min:100')]
    public $height;

    #[Validate('required|numeric:max:200|min:50')]
    public $depth;


    public $selectedColor = null;

    public $result = [
        'thickness' => '',
        'color' => '',
        'doorType' => '',
        'width' => '',
        'height' => '',
        'depth' => '',
    ];


    public function generate()
    {

        $this->result = [
            'thickness' => $this->thickness,
            'color' => PanelColor::find($this->color),
            'doorType' => $this->doorType,
            'width' =>  $this->width,
            'height' =>   $this->height,
            'depth' => $this->depth,
        ];
    }


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
