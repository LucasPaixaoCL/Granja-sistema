<?php

namespace App\Http\Requests;

use App\Models\ParamTipoDespesa;
use Illuminate\Foundation\Http\FormRequest;

class StoreParamTipoDespesaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', ParamTipoDespesa::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'descricao' => 'required|min:3|max:30',
        ];
    }
}
