<?php

namespace App\Http\Requests;

use App\Models\ParamDetalheProgramaVacinacao;
use Illuminate\Foundation\Http\FormRequest;

class StoreParamDetalheProgramaVacinacaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', ParamDetalheProgramaVacinacao::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'dia' => 'required',
            // 'semana' => 'required',
            // 'enfermidade' => 'required'
        ];
    }
}
