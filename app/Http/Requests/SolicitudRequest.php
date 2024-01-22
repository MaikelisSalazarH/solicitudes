<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SolicitudRequest extends FormRequest
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
            'nombre_solicitante' => 'required|string|max:255',
            'nun_telefono' => 'required|string|max:15',
            'descripcion' => 'required|string|max:500',
            'titulo_solicitud' => 'required|string|max:255',
          ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nombre_solicitante.required' => 'El campo nombre_solicitante es obligatorio.',
            'nombre_solicitante.max' => 'El campo nombre_solicitante no debe exceder los 255 caracteres.',
            'nun_telefono.required' => 'El campo num_telefono es obligatorio.',
            'nun_telefono.max' => 'El campo num_telefono no debe exceder los 15 caracteres.',
            'descripcion.required' => 'El campo descripcion es obligatorio.',
            'descripcion.max' => 'El campo descripcion no debe exceder los 500 caracteres.',
            'titulo_solicitud.required' => 'El campo titulo_solicitud es obligatorio.',
            'titulo_solicitud.max' => 'El campo titulo_solicitud no debe exceder los 500 caracteres.',
        ];
    }
}
