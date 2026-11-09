<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

class ResetForm extends Component
{

    #[Validate('required', as:"Token")]
    public $token;
    #[Validate('required|email', as:"E-mail")]
    public $email;
    #[Validate('required|min:8|confirmed', as:"Mot de passe")]
    public $password;

    public $password_confirmation;


    public function mount($token)
    {
        $this->token = $token;
    }

    public function resetPassword()
    {
        $this->validate();

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            session()->flash('message', __($status));
            return redirect()->route('user.login');
        } else {
            $this->addError('email', __($status));
        }
    }

    public function render()
    {
        return view('livewire.reset-form');
    }
}