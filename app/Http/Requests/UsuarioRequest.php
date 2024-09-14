<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'name' => ['required', 'min:5'],
            'email' => ['required', 'email'],
            'cpf' => ['required', 'numeric'],
            'password' => ['required'],
            'tipo' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório!',
            'name.min' => 'Nome é no minimo 5 caracteres!',
            'email.required' => 'Email é obrigatório!',
            'email.email' => 'Email em formato inválido!',
            'cpf.required' => 'CPF é obrigatório!',
            'cpf.numeric' => 'Somente invalido!',
            'password.required' => 'Senha obrigatório!',
            'tipo.required' => 'Tipo é obrigatório!'
        ];
    }
}
