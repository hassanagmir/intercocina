<?php

namespace App\Livewire;

use App\Models\Subscriber;
use Livewire\Component;

class SubscribeForm extends Component
{


    public $email;

    public function subscribe()
    {

        $this->validate([
            'email' => 'required|email|unique:subscribers',
        ]);

        Subscriber::create([
            'full_name' => $this->email,
            'email' => $this->email,
        ]);

        session()->flash("message", __("Veuillez vérifier votre boite e-mail pour un lien de vérification afin de compléter votre abonnement."));
        $this->reset();
    }



    public function render()
    {
        return view('livewire.subscribe-form');
    }
}
