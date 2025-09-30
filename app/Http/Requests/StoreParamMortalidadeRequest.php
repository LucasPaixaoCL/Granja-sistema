<?php

namespace App\Http\Requests;

use App\Models\ParamMortalidade;
use Illuminate\Foundation\Http\FormRequest;

class StoreParamMortalidadeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', ParamMortalidade::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'semana' => 'required',
            'padrao' => 'required',
        ];
    }
}
