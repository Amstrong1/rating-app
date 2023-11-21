<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStructureRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'address' => ['required', 'string', 'min:3', 'max:255'],
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'contact' => ['required'],
            'email' => ['required', 'email:filter'],
            'logo' => ['image', 'max:5000'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ce champ est requis.',
            'name.string' => 'Ce champ doit etre une chaine de caractère.',
            'name.max:255' => 'Ce champ ne doit pas avoir plus de 255 caractères.',
            'name.min:3' => 'Ce champ doit avoir au moins de 3 caractères.',
            
            'address.required' => 'Ce champ est requis.',
            'address.string' => 'Ce champ doit etre une chaine de caractère.',
            'address.max:255' => 'Ce champ ne doit pas avoir plus de 255 caractères.',
            'address.min:3' => 'Ce champ doit avoir au moins de 3 caractères.',
            
            'email.required' => 'Ce champ est requis.',
            'email.unique:structures' => 'Email existe déja.',
            'email.email:filter' => 'Email non valide.',
            
            'logo.required' => 'Ce champ est requis.',
            'logo.image' => 'Type de fichier non supporté.',
            'logo.max:5000' => 'Taille du fichier supérieur à 5Mo.',
        ];
    }
}
