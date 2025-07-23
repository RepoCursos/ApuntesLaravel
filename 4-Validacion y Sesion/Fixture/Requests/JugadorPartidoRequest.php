<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JugadorPartidoRequest extends FormRequest
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
            'goles' => ['nullable', 'numeric', 'max:255'],
            'asistencias' => ['nullable', 'numeric', 'max:255'],
            'partido_id' => ['required'],
            'jugador_id' => ['required'],
        ];
    }
}
