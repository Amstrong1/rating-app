<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuizRequest extends FormRequest
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
            'question' => 'required|string|max:255|min:3',
        ];
    }

    public function messages()
    {
        return [
            'question.required' => 'Ce champ est requis.',
            'question.string' => 'Ce champ doit etre une chaine de caractère.',
            'question.max:50' => 'Ce champ ne doit pas avoir plus de 50 caractères.',
            'question.min:3' => 'Ce champ doit avoir au moins de 3 caractères.',
        ];
    }
}
