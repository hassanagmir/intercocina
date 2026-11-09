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

    protected $messages = [
        'full_name.required' => 'Le nom complet est requis.',
        'full_name.max' => 'Le nom complet ne peut pas dépasser 255 caractères.',
    
        'phone.required' => 'Le numéro de téléphone est requis.',

        'phone.max' => 'Le numéro de téléphone ne peut pas dépasser 20 caractères.',
    
        'email.required' => "L'adresse e-mail est requise.",
        'email.email' => 'Veuillez fournir une adresse e-mail valide.',
        'email.max' => "L'adresse e-mail ne peut pas dépasser 255 caractères.",
    
        'message.required' => 'Le message est requis.',
    
        'subject.required' => 'Le sujet est requis.',
        'subject.max' => 'Le sujet ne peut pas dépasser 255 caractères.',
    ];
    


    public function store()
    {
        $this->validate($this->rules, $this->messages);

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

