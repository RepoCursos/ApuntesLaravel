<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JugadorRequest extends FormRequest
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
            'fecha_nac' => ['required', 'date'],
            'direccion' => ['max:255'],
            'telefono' => ['required', 'max_digits:9'],
            'email' => ['required', 'email:rfc,dns', Rule::unique('jugadors')->ignore($this->route('jugador'))],
            'posicion' => ['required','max:5'],
            'num_camiseta' => ['required', 'numeric', 'max_digits:3'],
            'equipo_id' => ['required'],
        ];
    }
}
