<?php

namespace App\Http\Requests\Services\PuestosService;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @property int id
 * @property string puesto
 */
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
            'id'        => ['required', 'integer', 'exists:puestos,id'],
            'puesto'    => ['required', 'string', 'unique:puestos,puesto']
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
            'id.required'                           =>  'El campo :attribute es requerido',
            'id.integer'                            =>  'El campo :attribute debe ser de tipo entero',
            'id.exists'                             =>  'El campo :attribute debe de existir en la base de datos',
            'puesto.required'                       =>  'El campo :attribute es requerido',
            'puesto.string'                         =>  'El campo :attribute debe ser una cadena de texto',
            'puesto.unique'                         =>  'El campo :attribute debe ser único'
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
            'id'            => 'Registro Único',
            'puesto'        => 'Puesto'
        ];
    }
}
