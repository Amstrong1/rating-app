<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'place' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'Ce champ est requis.',
            'name.string' => 'Ce champ doit etre une chaine de caractère.',
            'name.max:255' => 'Ce champ ne doit pas avoir plus de 255 caractères.',
            'place.required' => 'Ce champ est requis.',
        ];
    }
}
