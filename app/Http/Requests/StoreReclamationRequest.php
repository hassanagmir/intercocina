<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReclamationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fullName'     => ['required', 'string', 'max:255'],
            'subject'      => ['required', 'string', 'max:255'],
            'phone'        => ['required', 'string', 'max:50'],
            'clientNumber' => ['nullable', 'string', 'max:50'],
            'message'      => ['required', 'string'],
            'files'        => ['nullable', 'array'],
            'files.*'      => [
                'file',
                'max:10240', // 10 Mo
                'mimes:pdf,jpg,jpeg,png,gif,webp,doc,docx,xls,xlsx',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'fullName.required' => "Le nom complet est obligatoire.",
            'subject.required'  => "Le sujet est obligatoire.",
            'phone.required'    => "Le numéro de téléphone est obligatoire.",
            'message.required'  => "Le message est obligatoire.",
            'files.*.max'       => "Chaque fichier doit faire moins de 10 Mo.",
            'files.*.mimes'     => "Type de fichier non autorisé.",
        ];
    }
}