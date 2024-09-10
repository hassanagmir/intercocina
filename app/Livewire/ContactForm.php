<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactForm extends Component
{
    public $full_name, $phone, $email, $message, $status, $subject, $contact_id;

    protected $rules = [
        'full_name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
        'subject' => 'required|string|max:255',
    ];


    public function store()
    {
        $this->validate();

        Contact::create([
            'full_name' => $this->full_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'message' => $this->message,
            'subject' => $this->subject,
        ]);

        session()->flash('message', __("Votre message a été envoyé avec succès"));
        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}

