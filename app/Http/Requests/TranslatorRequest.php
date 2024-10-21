<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TranslatorRequest extends FormRequest
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
            'text' => 'required|string',
            'from' => 'required|string',
            'to' => 'required|string'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'text.required' => 'O texto é obrigatório',
            'text.string' => 'O texto deve ser uma string',
            'from.required' => 'O idioma de origem é obrigatório',
            'from.string' => 'O idioma de origem deve ser uma string',
            'to.required' => 'O idioma de destino é obrigatório',
            'to.string' => 'O idioma de destino deve ser uma string'
        ];
    }
}
