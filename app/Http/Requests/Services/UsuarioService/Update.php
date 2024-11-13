<?php

namespace App\Http\Requests\Services\UsuarioService;

/**
 * @property int id
 * @property string nombre
 * @property string app
 * @property string apm
 * @property string correo
 * @property string contraseña
 * @property string acciones
 * @property int id_area_trabajo
 * @property int id_puestos
 * @property int id_perfiles
 */

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
            //
            'id'                   => ['required', 'integer', 'exists:usuario,id'],
            'nombre'               => ['required', 'string'],
            'app'                  => ['required', 'string'],
            'apm'                  => ['required', 'string'],
            'correo'               => ['required', 'string'],
            'contraseña'           => ['required', 'string'],
            'acciones'             => ['required', 'string'],
            'id_puestos'           => ['required', 'integer', 'exists:puestos,id'],
            'id_perfiles'          => ['required', 'integer', 'exists:perfiles,id']
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
            //
            'id.required'              => 'El campo :attribute es requerido',
            'id.integer'               => 'El campo :attribute debe de ser de tipo entero',
            'id.exists'                => 'El campo :attribute debe de existir en la base de datos',
            'nombre.required'          => 'El campo :attribute es requerido',
            'nombre.string'            => 'El campo :attribute debe ser una cadena de texto',
            'app.required'             => 'El campo :attribute es requerido',
            'app.string'               => 'El campo :attribute debe ser una cadena de texto',
            'apm.required'             => 'El campo :attribute es requerido',
            'apm.string'               => 'El campo :attribute debe ser una cadena de texto',
            'correo.required'          => 'El campo :attribute es requerido',
            'correo.string'            => 'El campo :attribute debe ser una cadena de texto',
            'contraseña.required'      => 'El campo :attribute es requerido',
            'contraseña.string'        => 'El campo :attribute debe ser una cadena de texto',
            'acciones.required'        => 'El campo :attribute es requerido',
            'acciones.string'          => 'El campo :attribute debe ser una cadena de texto',
            'id_puestos.required'      => 'El campo :attribute es requerido',
            'id_puestos.integer'       => 'El campo :attribute debe de ser de tipo entero',
            'id_puestos.exists'        => 'El campo :attribute debe de existir en la base de datos',
            'id_perfiles.required'     => 'El campo :attribute es requerido',
            'id_perfiles.integer'      => 'El campo :attribute debe de ser de tipo entero',
            'id_perfiles.exists'       => 'El campo :attribute debe de existir en la base de datos'
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
            //
            
            'id'                    =>'Identificador unico de la tabla',
            'nombre'                =>'Nombre',
            'app'                   =>'Apellido Paterno',
            'apm'                   =>'Apellido Materno',
            'correo'                =>'Correo del usuario',
            'contraseña'            =>'Contraseña del usuario',
            'acciones'              =>'Acciones',
            'id_puesto'             =>'Identificador unico de la tabla Puestos',
            'id_perfiles'           =>'Identificador unico de la tabla'
        ];
    }
}
