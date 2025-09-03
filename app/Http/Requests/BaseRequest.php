<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
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
            //
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'sometimes' => 'O campo :attribute é opcional, mas deve conter um valor quando informado',
            'string' => 'O campo :attribute deve ser uma string',
            'numeric' => 'O campo :attribute deve ser um número',
            'integer' => 'O campo :attribute deve ser um número inteiro',
            'email' => 'O campo :attribute deve ser um email válido',
            'exists' => 'O campo :attribute não existe nos registros',
            'min' => 'O campo :attribute deve ser no mínimo :min',
        ];
    }
}
