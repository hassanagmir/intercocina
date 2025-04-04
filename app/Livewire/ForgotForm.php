<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Validate;

class ForgotForm extends Component
{
    #[Validate('email|required', as: "E-mail")]
    public $email;

    public function render()
    {
        return view('livewire.forgot-form');
    }

    public function sendResetLink()
    {
        $this->validate();

        $status = Password::sendResetLink(
            ['email' => $this->email]
        );

        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('message', __($status));
            $this->email = '';
        } else {
            $this->addError('email', __($status));
        }
    }
}
