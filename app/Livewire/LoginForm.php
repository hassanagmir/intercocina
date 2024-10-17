<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LoginForm extends Component
{

    #[Validate('required|email', as:"E-mail")]
    public $email;
    #[Validate('required', as:"Mot de passe")]
    public $password;

    public $remamber = "agmir";


    public static function mount(){
        if(auth()->user()){
            return redirect('profile');
        }
    }


    public function login()
    {
        $this->validate();


        $user = User::where('email', $this->email)->first();
        if($user && $user->status == "inactive"){
            session()->flash('error', __("Désolé, votre compte a été suspendu"));
            return;
        }

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
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
