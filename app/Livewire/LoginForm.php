<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LoginForm extends Component
{

    #[Validate('required|email')]
    public $email;
    #[Validate('required')]
    public $password;

    public $remamber = "agmir";



    public function login()
    {
        $this->validate();

        // if($this->remamber){
        //     if (Auth::viaRemember(['email' => $this->email, 'password' => $this->password])) {
        //         dd("remamber me");
        //         return redirect()->route('home');
        //     }else {
        //         session()->flash('error', __("Informations d'identification non valides"));
        //     }
        // }

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // $this->emit('reloadPage');

            $this->dispatch("reloadPage");
            
        } else {
            session()->flash('error', __("Informations d'identification non valides"));
        }
    }


    public function render()
    {
        return view('livewire.login-form');
    }
}
