<?php

namespace App\Livewire;

use App\Models\Address;
use App\Models\City;
use Livewire\Component;

class AddressForm extends Component
{

    public $address_name;
    public $first_name;
    public $last_name;
    public $phone;
    public $city;
    public $email;

    public $cities = [];

    public function mount()
    {
        $this->cities = City::all();
    }

    protected $rules = [
        'address_name' => 'required|string',
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'phone' => 'required|string',
        'city' => 'required|exists:cities,id',
        'email' => 'nullable|email',
    ];

    public function submit()
    {
        $this->validate();


        Address::create([
            'user_id' => auth()->id(),
            'address_name' => $this->address_name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'city_id' => $this->city,
            'email' => $this->email,
        ]);

        session()->flash('message', __('Adresse créée avec succès.'));
        $this->reset();
        $this->cities = City::all();
        $this->dispatch('reloadPage');
    }


    public function render()
    {
        return view('livewire.address-form');
    }
}
