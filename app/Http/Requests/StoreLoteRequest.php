<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreLoteRequest extends FormRequest
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
            'nucleo_id' => 'required|exists:nucleos,id',
            'data_lote' => 'required|date',
            'qtde_aves' => 'required|integer|min:1',
            'qtde_machos' => 'required|integer|min:0|lte:qtde_aves',
            'param_programa_vacinacao_id' => 'required|exists:param_programa_vacinacao,id',
            'param_linhagem_id' => 'required|exists:param_linhagens,id',
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
            'nucleo_id.required' => 'O núcleo é obrigatório.',
            'nucleo_id.exists' => 'O núcleo selecionado não é válido.',
            'data_lote.required' => 'A data do lote é obrigatória.',
            'data_lote.date' => 'A data do lote deve ser uma data válida.',
            'qtde_aves.required' => 'A quantidade de aves é obrigatória.',
            'qtde_aves.integer' => 'A quantidade de aves deve ser um número inteiro.',
            'qtde_aves.min' => 'A quantidade de aves deve ser no mínimo 1.',
            'qtde_machos.required' => 'A quantidade de machos é obrigatória.',
            'qtde_machos.integer' => 'A quantidade de machos deve ser um número inteiro.',
            'qtde_machos.min' => 'A quantidade de machos deve ser no mínimo 0.',
            'qtde_machos.lte' => 'A quantidade de machos não pode ser maior que a quantidade de aves.',
            'param_programa_vacinacao_id.required' => 'O programa de vacinação é obrigatório.',
            'param_programa_vacinacao_id.exists' => 'O programa de vacinação selecionado não é válido.',
            'param_linhagem_id.required' => 'A linhagem é obrigatória.',
            'param_linhagem_id.exists' => 'A linhagem selecionada não é válida.',
        ];
    }
}

