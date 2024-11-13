<?php

namespace App\Http\Requests\Services\UsuariosService;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed|null foto
 * @property string nombre
 * @property string ap_pat
 * @property string ap_mat
 * @property string email
 * @property string password
 * @property float sueldo
 * @property int id_perfiles
 * @property int id_empresas
 * @property int id_puestos
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
            'foto'              => ['nullable', 'exclude_if:foto,null', 'file', 'image', 'mimes:jpg,jpeg,png'],
            'nombre'            => ['required', 'string'],
            'ap_pat'            => ['required', 'string'],
            'ap_mat'            => ['required', 'string'],
            'email'             => ['required', 'email', 'unique:usuarios,email'],

            'password' => [
                'nullable',
                'max:50',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],

            'sueldo'            => ['required', 'numeric'],
            'id_perfiles'       => ['required', 'integer', 'exists:perfiles,id'],
            'id_puestos'        => ['required', 'integer', 'exists:puestos,id'],
            'id_empresas'       => ['required', 'integer', 'exists:empresas,id']
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
            'foto.file'                             => 'El campo :attribute debe ser un archivo',
            'foto.image'                            => 'El campo :attribute debe ser una imagen',
            'foto.mimes'                            => 'El campo :attribute debe ser de tipo jpg, jpeg o png',
            'nombre.required'                       => 'El campo :attribute es requerido',
            'nombre.string'                         => 'El campo :attribute debe ser una cadena de texto',
            'ap_pat.required'                       => 'El campo :attribute es requerido',
            'ap_mat.string'                         => 'El campo :attribute debe ser una cadena de texto',
            'email.required'                        => 'El campo :attribute es requerido',
            'email.email'                           => 'El campo :attribute debe ser de tipo email',
            'email.unique'                          => 'El campo :attribute debe ser unico',
            'password.required'                     => 'El campo :attribute es requerido',
            'password.max'                          => 'El campo :attribute no debe contener mas de 50 caracteres',
            'sueldo.required'                       => 'El campo :attribute es requerido',
            'sueldo.numeric'                        => 'El campo :attribute debe ser de tipo decimal',
            'id_perfiles.required'                  => 'El campo :attribute es requerido',
            'id_perfiles.integer'                   => 'El campo :attribute debe ser de tipo entero',
            'id_perfiles.exists'                    => 'El campo :attribute debe existir en la base de datos',
            'id_puestos.required'                   => 'El campo :attribute es requerido',
            'id_puestos.integer'                    => 'El campo :attribute debe ser de tipo entero',
            'id_puestos.exists'                     => 'El campo :attribute debe existir en la base de datos',
            'id_empresas.required'                  => 'El campo :attribute es requerido',
            'id_empresas.integer'                   => 'El campo :attribute debe ser de tipo entero',
            'id_empresas.exists'                    => 'El campo :attribute debe existir en la base de datos',
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

            'nombre'                    => 'nombre (s)',
            'ap_pat'                    => 'apellido paterno',
            'ap_mat'                    => 'apellido materno',
            'email'                     => 'correo electrónico',
            'password'                  => 'contraseña',
            'sueldo'                    => 'sueldo',
            'id_perfiles'               => 'perfiles',
            'foto'                      => 'foto',
            'id_puestos'                => 'Puestos',
            'id_empresas'               => 'Empresa'
        ];
    }
}