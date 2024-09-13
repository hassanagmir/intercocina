<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reclamation;

class ClaimForm extends Component
{
    public $clientNumber;
    public $fullName;
    public $subject;
    public $phone;
    public $message;

    protected $rules = [
        'clientNumber' => 'nullable|string',
        'fullName' => 'required|string|max:255',
        'subject' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'message' => 'required|string',
    ];

    protected $messages = [
        'clientNumber.string' => 'Le numéro de client doit être une chaîne de caractères.',
        'fullName.required' => 'Le nom complet est obligatoire.',
        'fullName.string' => 'Le nom complet doit être une chaîne de caractères.',
        'fullName.max' => 'Le nom complet ne doit pas dépasser 255 caractères.',
        'subject.required' => 'Le sujet est obligatoire.',
        'subject.string' => 'Le sujet doit être une chaîne de caractères.',
        'subject.max' => 'Le sujet ne doit pas dépasser 255 caractères.',
        'phone.required' => 'Le numéro de téléphone est obligatoire.',
        'phone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
        'phone.max' => 'Le numéro de téléphone ne doit pas dépasser 255 caractères.',
        'message.required' => 'Le message est obligatoire.',
        'message.string' => 'Le message doit être une chaîne de caractères.',
    ];

    public function submit()
    {
        $this->validate($this->rules, $this->messages);

        Reclamation::create([
            'client_number' => $this->clientNumber,
            'full_name' => $this->fullName,
            'subject' => $this->subject,
            'phone' => $this->phone,
            'message' => $this->message,
        ]);

        $this->reset(['clientNumber', 'fullName', 'subject', 'phone', 'message']);

        session()->flash('message', 'Réclamation soumise avec succès!');
    }

    public function render()
    {
        return view('livewire.claim-form');
    }
}