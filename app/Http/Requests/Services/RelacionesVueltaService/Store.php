<?php

namespace App\Http\Requests\Services\RelacionesVueltaService;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int id
 * @property float fase
 * @property float rojo
 * @property float negro
 * @property float tap_1
 * @property float tap_2
 * @property float tap_3
 * @property float tap_4
 * @property float tap_5
 * @property string created_at
 * @property string updated_at
 */
class Store extends FormRequest
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
            'idTransformadorTrifasico' => ['required', 'integer', 'exists:transformadores_trifasicos,id'],
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
            'idTransformadorTrifasico.required' => 'El campo :attribute es obligatorio.',
            'idTransformadorTrifasico.integer'  => 'El valor del campo :attribute debe ser un número entero.',
            'idTransformadorTrifasico.exists'   => 'El valor del campo :attribute debe existir en la base de datos.',
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
            'idTransformadorTrifasico' => 'Identificador Transformador Trifasico',
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
