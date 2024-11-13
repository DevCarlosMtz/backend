<?php

namespace App\Http\Requests\Services\PerfilesService;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int id
 * @property string nombre
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

            "id"        => ["required", "integer", "exists:perfiles,id"],
            "nombre"    => ["required", "string"]
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

            "id.required"       => "El campo :attribute es requerido",
            "id.integer"        => "El campo :attribute es de tipo entero",
            "id.exists"         => "El campo :attribute debe existir en la base de datos",
            "nombre.required"   => "El campo :attribute es requerido",
            "nombre.string"     => "El campo :attribute debe ser una cadena de texto"

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

            "id"        => "Registro único",
            "nombre"    => "Nombre del perfil"
        ];
    }
}
