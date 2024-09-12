<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class RegisterForm extends Component
{
    #[Validate('required|string|max:255', as:"Prénom")]
    public $first_name;
    #[Validate('required|string|max:255', as:"Nom")]
    public $last_name;
    #[Validate('required|email|unique:users', as:"E-mail")]
    public $email;
    #[Validate('required|min:6|confirmed', as:"Mot de passe")]
    public $password;

    public $password_confirmation;


    public function register()
    {
        $this->validate();

        $user = User::create([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);
        $this->dispatch("reloadPage");
    }


    public function render()
    {
        return view('livewire.register-form');
    }
}
