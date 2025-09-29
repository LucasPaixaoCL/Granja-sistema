<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRhUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->can("admin");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "salary" => "required|decimal:2",
            "admission_date" => "required|date_format:Y-m-d"
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
            "salary.required" => "O salário é obrigatório.",
            "salary.decimal" => "O salário deve ser um número com duas casas decimais.",
            "admission_date.required" => "A data de admissão é obrigatória.",
            "admission_date.date_format" => "A data de admissão deve estar no formato YYYY-MM-DD.",
        ];
    }
}

