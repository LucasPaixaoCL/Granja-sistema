<?php

namespace App\Http\Requests;

use App\Models\Venda;
use Illuminate\Foundation\Http\FormRequest;

class StoreVendaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Venda::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'data_venda' => 'required'
            // As regras de validação estão comentadas no controller original, então não vou adicioná-las aqui por enquanto.
            // Se houver necessidade, elas podem ser adicionadas posteriormente.
        ];
    }
}
