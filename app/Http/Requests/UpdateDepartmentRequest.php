<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateDepartmentRequest extends FormRequest
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
        // Ignora o próprio ID do departamento na validação de unicidade
        return [
            "name" => "required|string|max:50|unique:departments,name," . $this->route("department")->id,
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
            "name.required" => "O nome do departamento é obrigatório.",
            "name.unique" => "Já existe um departamento com este nome.",
            "name.max" => "O nome do departamento não pode ter mais de 50 caracteres.",
        ];
    }
}

