<?php

namespace App\Http\Requests\Auth;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string nombre
 * @property string ap_pat
 * @property string ap_mat
 * @property string email
 * @property string|null password
 * @property mixed|null foto
 */
class ActualizarPerfil extends FormRequest
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
            'nombre' => ['required', 'string'],
            'ap_pat' => ['required', 'string'],
            'ap_mat' => ['required', 'string'],
            'email'  => ['required', 'string', 'email'],
            'password' => [
                'nullable',
                'confirmed',
                'max:50',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
            'foto' => ['nullable', 'exclude_if:foto,null', 'file', 'image', 'mimes:jpg,jpeg,png'],
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
            'nombre.required' => 'El campo :attribute es obligatorio',
            'nombre.string'   => 'El campo :attribute debe ser una cadena de texto',
            'ap_pat.required' => 'El campo :attribute es obligatorio',
            'ap_pat.string'   => 'El campo :attribute debe ser una cadena de texto',
            'ap_mat.required' => 'El campo :attribute es obligatorio',
            'ap_mat.string'   => 'El campo :attribute debe ser una cadena de texto',
            'email.required'  => 'El campo :attribute es obligatorio',
            'email.string'    => 'El campo :attribute debe ser una cadena de texto',
            'email.email'     => 'El campo :attribute debe ser un correo electrónico válido',
            "password.max"    => "El campo :attribute no debe contener mas de 50 caracteres",
            'foto.file'       => 'El campo :attribute debe ser un archivo',
            'foto.image'      => 'El campo :attribute debe ser una imagen',
            'foto.mimes'      => 'El campo :attribute debe ser un archivo de tipo: :values',
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
            'nombre'   => 'nombre',
            'ap_pat'   => 'apellido paterno',
            'ap_mat'   => 'apellido materno',
            'email'    => 'correo electrónico',
            'password' => 'contraseña',
            'foto'     => 'foto',
        ];
    }
}
