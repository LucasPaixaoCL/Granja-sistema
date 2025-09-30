<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMorteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Morte::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'lote' => 'required|exists:lotes,id',
            'data_morte' => [
                'required',
                Rule::unique('mortes', 'data_morte')->where(fn ($query) => $query->where('lote_id', $this->lote)),
            ],
            'qtde_mortes' => 'required|numeric|min:1',
        ];
    }
}
