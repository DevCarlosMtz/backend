<?php

namespace App\Http\Requests\Services\PuestosService;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @property string puesto
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
            'puesto'    => ['nullable', 'string']
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
            'puesto'    => 'El campo :attribute debe ser una cadena de texto'
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
            'puesto'    => 'Puesto'
        ];
    }
}
