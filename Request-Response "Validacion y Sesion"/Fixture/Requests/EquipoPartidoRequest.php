<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipoPartidoRequest extends FormRequest
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
            'golesFL' => 'required|integer',  // Validar que 'golesFL' sea un número entero
            'golesFV' => 'required|integer',  // Validar que 'golesFV' sea un número entero
            'resultadoL' => 'required|in:G,E,P', // Validar que 'resultadoL' sea uno de los valores permitidos
            'resultadoV' => 'required|in:G,E,P', // Validar que 'resultadoV' sea uno de los valores permitidos
        ];
    }
}
