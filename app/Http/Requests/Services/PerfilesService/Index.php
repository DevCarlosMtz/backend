<?php

namespace App\Http\Requests\Services\PerfilesService;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @property string nombre
 */
class Index extends FormRequest
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

            "nombre"    => ["nullable", "string", "exists:perfiles,nombre"]
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

            "nombre.string"         => "El campo :attribute debe ser una cadena de texto",
            "nombre.exists"         => "El campo :attribute debe existir en la base de datos"

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
            "nombre"        => "Nombre del perfil"
        ];
    }
}
