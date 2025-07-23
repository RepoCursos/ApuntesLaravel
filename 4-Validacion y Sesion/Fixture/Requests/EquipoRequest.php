<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class EquipoRequest extends FormRequest
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
            'file_uri' => [File::image()->max(10 * 1024)->dimensions(Rule::dimensions()->maxWidth(650)->maxHeight(650))],
            'nombre' => ['required', 'max:255'],
            'estado' => ['required'],
            'torneo_id' => ['required'],
        ];
    }
}
