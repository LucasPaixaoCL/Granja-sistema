<?php

namespace App\Http\Requests;

use App\Models\Nucleo;
use Illuminate\Foundation\Http\FormRequest;

class StoreNucleoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', Nucleo::class);
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
            'area_total' => 'required',
        ];
    }
}
