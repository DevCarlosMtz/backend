<?php

namespace App\Http\Requests\Services\RelacionesVueltaService;

use Illuminate\Foundation\Http\FormRequest;

class Show extends FormRequest
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
            'idRelacionVuelta' => ['required', 'integer', 'exists:relaciones_vuelta,id']

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
            'idRelacionVuelta.required' => 'El campo :attribute es obligatorio.',
            'idRelacionVuelta.integer'  => 'El valor del campo :attribute debe ser un número entero.',
            'idRelacionVuelta.exists'   => 'El valor del campo :attribute debe existir en la base de datos.'
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
            'idRelacionVuelta' => 'idRelacionVuelta'
        ];
    }
}
