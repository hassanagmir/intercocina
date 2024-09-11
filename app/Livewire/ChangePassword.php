<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class ChangePassword extends Component
{
    public string $current_password = '';
    public string $new_password = '';
    public string $confirm_password = '';

    public function rules()
    {
        return [
            'current_password' => ['required'],
            'new_password' => ['required', Password::defaults()],
            'confirm_password' => ['required', 'same:new_password'],
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'Le mot de passe actuel est requis.',
            'new_password.required' => 'Le nouveau mot de passe est requis.',
            'confirm_password.required' => 'La confirmation du mot de passe est requise.',
            'confirm_password.same' => 'La confirmation du mot de passe ne correspond pas au nouveau mot de passe.',
        ];
    }

    public function updatePassword()
    {
        $this->validate();

        if (!Hash::check($this->current_password, Auth::user()->password)) {
            $this->addError('current_password', 'Le mot de passe actuel est incorrect.');
            return;
        }

        Auth::user()->update([
            'password' => Hash::make($this->new_password),
        ]);

        $this->reset();

        session()->flash('message', __('Mot de passe mis à jour avec succès. Veuillez vous reconnecter.'));
    }

    public function render()
    {
        return view('livewire.change-password');
    }
}