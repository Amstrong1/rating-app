<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ce champ est requis.',
            'name.string' => 'Ce champ doit etre une chaine de caractère.',
            'name.max:255' => 'Ce champ ne doit pas avoir plus de 255 caractères.',
            'email.required' => 'Ce champ est requis.',
            'email.string' => 'Ce champ doit etre une chaine de caractère.',
            'email.lowercase' => 'Email doit etre en miniscule.',
            'email.email' => 'Email non valide.',
            'email.max:255' => 'Ce champ ne doit pas avoir plus de 255 caractères.',
        ];
    }
}
