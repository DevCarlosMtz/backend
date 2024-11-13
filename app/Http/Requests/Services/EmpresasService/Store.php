<?php

namespace App\Http\Requests\Services\EmpresasService;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed|null foto
 * @property string nombre
 * @property string rfc
 * @property string responsable
 * @property string domicilio_fiscal
 * @property string dominio
 * @property string aviso_privacidad
 * @property int telefono
 * @property string email
 * @property string password
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
            'foto'                          => ['nullable', 'file', 'image', 'mimes:jpg,jpeg,png'],
            'nombre'                        => ['required', 'string', 'max:255'],
            'rfc'                           => ['required', 'string', 'unique:empresas', 'max:13', 'regex:/^[A-Z]{4}[0-9]{6}[A-Z0-9]{3}$/'],
            'dominio'                       => ['nullable', 'string', 'max:45', 'nullable'],
            'aviso_privacidad'              => ['nullable', 'string', 'nullable'],
            'telefono'                      => ['required', 'string'],
            'domicilio_fiscal'              => ['required', 'string', 'max:255'],
            'responsable'            => ['required', 'string', 'max:255'],
            'ap_pat'                        => ['required', 'string', 'max:255'],
            'ap_mat'                        => ['required', 'string', 'max:255'],
            'email'                         => ['required', 'email', 'unique:usuarios,email'],
            'password' => [
                'required',
                'max:50',
                'confirmed',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
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
            'nombre.max'                            => 'El campo :attribute no puede tener mas de 50 caracteres',
            'rfc.required'                          => 'El campo :attribute es requerido',
            'rfc.string'                            => 'El campo :attribute debe ser una cadena de texto',
            'rfc.max'                               => 'El campo :attribute no puede contener mas de 13 caracteres',
            'rfc.unique'                            => 'El campo :attribute no puede ser repetido',
            'rfc.regex'                             => 'El campo :attribute no cumple con el formato correcto (Ejemplo: AAAA000000AAA)',
            'responsable.required'                  => 'El campo :attribute es requerido',
            'responsable.string'                    => 'El campo :attribute debe ser una cadena de texto',
            'domicilio_fiscal.required'             => 'El campo :attribute es requerido',
            'domicilio_fiscal.string'               => 'El campo :attribute debe ser una cadena de texto',
            'dominio.string'                        => 'El campo :attribute debe ser una cadena de texto',
            'dominio.max'                           => 'El campo :attribute no puede contener mas de 45 caracteres',
            'aviso_privacidad.string'               => 'El campo :attribute debe ser una cadena de texto',
            'telefono.required'                     => 'El campo :attribute es requerido',
            'telefono.integer'                      => 'El campo :attribute debe ser de tipo entero',
            'email.required'                        => 'El campo :attribute es requerido',
            'email.email'                           => 'El campo :attribute debe de tipo email',
            'email.unique'                          => 'El campo :attribute debe ser unico',
            'password.required'                     => 'El campo :attribute es requerido',
            'password.max'                          => 'El campo :attribute no debe contener mas de 50 caracteres',


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
            'nombre'                => 'Nombre de empresa',
            'rfc'                   => 'RFC',
            'responsable'           => 'Responsable',
            'domicilio_fiscal'      => 'Domicilio fiscal',
            'aviso_privacidad'      => 'Aviso de privacidad',
            'telefono'              => 'Número telefonico',
            'foto'                  => 'Logo de la empresa',
            'email'                 => 'Email'
        ];
    }
}
