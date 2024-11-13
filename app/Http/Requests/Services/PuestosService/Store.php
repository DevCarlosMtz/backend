<?php

namespace App\Http\Requests\Services\PuestosService;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @property string puesto
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
            'puesto'        => ['required', 'string', 'unique:puestos,puesto']
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
            'puesto.required'       => 'El campo :attribute es requerido',
            'puesto.string'         => 'El campo :attribute debe ser una cadena de texto',
            'puesto.unique'         => 'El campo :attribute debe ser único'
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
            'puesto'               => 'Puesto'
        ];
    }
}
