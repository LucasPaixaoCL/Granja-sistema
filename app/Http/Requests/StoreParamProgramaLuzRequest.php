<?php

namespace App\Http\Requests;

use App\Models\ParamProgramaLuz;
use Illuminate\Foundation\Http\FormRequest;

class StoreParamProgramaLuzRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create', ParamProgramaLuz::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|min:3|max:30',
        ];
    }
}
