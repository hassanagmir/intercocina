<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component
{
    use WithFileUploads;

    public $user;
    public $first_name;
    public $last_name;
    public $address;
    public $gender;
    public $phone;
    public $image;
    public $email;
    public $name;
    public $city;



    public function messages(): array
    {
        return [
            'name.required' => "L'entreprise est requise",
        ];
    }

    public function mount()
    {
        $user = auth()->user();

        $this->user = $user;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->address = $user->address;
        $this->gender = $user->gender;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->name = $user->name;
        $this->city = $user->city_id;
    }

    public function updateProfile()
    {

        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|in:Mâle,Femelle',
            'phone' => 'nullable|string|max:20|unique:users,phone,' . $this->user->id,
            'image' => 'nullable|image|max:1024',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'name' => 'required|min:4|max:150'
        ]);

        if ($this->image) {
            $imagePath = $this->image->store('profile-photos', 'public');
            $this->user->image = $imagePath;
        }


        $this->user->update([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'address' => $this->address,
            'gender' => $this->gender,
            'phone' => $this->phone,
            'status' => $this->status,
            'email' => $this->email,
            'name' => $this->name
        ]);

        session()->flash('message', __("Profil modifié avec succès."));
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}