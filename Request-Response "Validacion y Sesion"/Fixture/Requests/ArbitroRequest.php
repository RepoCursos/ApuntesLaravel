<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArbitroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => ['required', 'max:255'],
            'apellido' => ['required', 'max:255'],
            'fecha_nac' => ['date'],
            'direccion' => ['max:255'],
            'telefono' => ['required','numeric', 'max_digits:9'],
            'email' => ['required', 'email', Rule::unique('arbitros')->ignore($this->route('arbitro'))],
        ];
    }
}
