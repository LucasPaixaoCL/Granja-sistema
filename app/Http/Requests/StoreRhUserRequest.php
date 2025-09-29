<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRhUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->can('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'select_department' => 'required|exists:departments,id',
            'address' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
            'city' => 'required|string|max:50',
            'phone' => 'required|string|max:50',
            'salary' => 'required|decimal:2',
            'admission_date' => 'required|date_format:Y-m-d'
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
            'name.required' => 'O nome é obrigatório.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'O e-mail deve ser um endereço de e-mail válido.',
            'email.unique' => 'Este e-mail já está em uso.',
            'select_department.required' => 'O departamento é obrigatório.',
            'select_department.exists' => 'O departamento selecionado não é válido.',
            'address.required' => 'O endereço é obrigatório.',
            'zip_code.required' => 'O CEP é obrigatório.',
            'city.required' => 'A cidade é obrigatória.',
            'phone.required' => 'O telefone é obrigatório.',
            'salary.required' => 'O salário é obrigatório.',
            'salary.decimal' => 'O salário deve ser um número com duas casas decimais.',
            'admission_date.required' => 'A data de admissão é obrigatória.',
            'admission_date.date_format' => 'A data de admissão deve estar no formato YYYY-MM-DD.',
        ];
    }
}

