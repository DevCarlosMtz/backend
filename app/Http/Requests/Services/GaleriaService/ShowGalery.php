<?php

namespace App\Http\Requests\Services\GaleriaService;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @property string ot
 * @property string tipo_imagen
 */
class ShowGalery extends FormRequest
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
            'ot'                    => ['required', 'string'],
            'tipo_imagen'           => ['required', 'string']
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
            'ot.required'           => 'El campo :attribute es requerido',
            'ot.string'             => 'El campo :attribute debe ser una cadena de texto',
            'tipo_imagen.required'  => 'El campo :attribute es requerido',
            'tipo_imagen.string'    => 'El campo :attribute debe ser una cadena de texto'
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
            'ot'                    => 'Orden de Trabajo',
            'tipo_imagen'           => 'Tipo de Imagen'
        ];
    }
}
