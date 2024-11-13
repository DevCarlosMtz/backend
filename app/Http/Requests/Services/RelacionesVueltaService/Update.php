<?php

namespace App\Http\Requests\Services\RelacionesVueltaService;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'idRelacionVuelta' => ['required', 'integer', 'exists:relaciones_vuelta,id'],
            'fase'          => ['nullable', 'numeric'],
            'rojo'          => ['nullable', 'numeric'],
            'negro'         => ['nullable', 'numeric'],
            'tap_1'         => ['nullable', 'numeric'],
            'tap_2'         => ['nullable', 'numeric'],
            'tap_3'         => ['nullable', 'numeric'],
            'tap_4'         => ['nullable', 'numeric'],
            'tap_5'         => ['nullable', 'numeric'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'idRelacionVuelta.required' => 'El campo :attribute es obligatorio.',
            'idRelacionVuelta.integer'  => 'El valor del campo :attribute debe ser un número entero.',
            'idRelacionVuelta.exists'   => 'El valor del campo :attribute debe existir en la base de datos.',
            'fase.numeric'                      => 'El valor del campo :attribute debe ser tipo decimal.',
            'rojo.numeric'                      => 'El valor del campo :attribute debe ser tipo decimal.',
            'negro.numeric'                     => 'El valor del campo :attribute debe ser tipo decimal.',
            'tap_1.numeric'                     => 'El valor del campo :attribute debe ser tipo decimal.',
            'tap_2.numeric'                     => 'El valor del campo :attribute debe ser tipo decimal.',
            'tap_3.numeric'                     => 'El valor del campo :attribute debe ser tipo decimal.',
            'tap_4.numeric'                     => 'El valor del campo :attribute debe ser tipo decimal.',
            'tap_5.numeric'                     => 'El valor del campo :attribute debe ser tipo decimal.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'idRelacionVuelta' => 'Identificador Relacion Vuelta',
            'fase'                  => 'Fase',
            'rojo'                  => 'Rojo',
            'negro'                 => 'Negro',
            'tap_1'                 => 'Tap 1',
            'tap_2'                 => 'Tap 2',
            'tap_3'                 => 'Tap 3',
            'tap_4'                 => 'Tap 4',
            'tap_5'                 => 'Tap 5',
        ];
    }
}
