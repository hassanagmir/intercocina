<?php

namespace App\Livewire;

use Livewire\Component;

class Auth extends Component
{

    public $isRegister = false;

    public function toggleMode()
    {
        $this->isRegister = !$this->isRegister;
    }


    public function render()
    {
        return view('livewire.auth');
    }
}
