<?php

namespace App\Http\Requests\Services\UsuariosService;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string token
 */
class Verificar extends FormRequest
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
            'token'                => ['required', 'string', 'exists:verified_email,token'],
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
            'token.required'                           => 'El campo :attribute es requerido',
            'token.string'                            => 'El campo :attribute debe ser una cadena de texto',
            'token.exists'                             => 'El campo :attribute debe existir en la base de datos',
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
            'token'                        => 'Codigo de verificación',
        ];
    }
}
