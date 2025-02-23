<?php

namespace App\Livewire;

use App\Models\Shipping;
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

    public $shipping;



    public function messages(): array
    {
        return [
            'name.required' => "L'entreprise est requise",
            'image.required' => 'Un fichier image est requis.',
            'image.image' => 'Le fichier téléchargé doit être une image.',
            'image.mimes' => 'Seuls les fichiers de type JPEG, PNG, JPG, GIF et SVG sont autorisés.',
            'image.max' => 'La taille de l\'image ne doit pas dépasser 2 Mo.',
        ];
    }

    public function mount()
    {
        $user = auth()->user();

        if($user->shipping_id){
            $this->shipping = $user->shipping;
        }

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'name' => 'required|min:4|max:150',
            'shipping' => 'nullable|numeric|exists:shippings,id',
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
            'email' => $this->email,
            'name' => $this->name
        ]);

        session()->flash('message', __("Profil modifié avec succès."));
    }

    public function render()
    {
        $shippings = Shipping::all();
        return view('livewire.edit-profile', compact('shippings'));
    }
}