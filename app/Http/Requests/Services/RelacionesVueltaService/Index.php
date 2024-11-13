<?php

namespace App\Http\Requests\Services\RelacionesVueltaService;

use Illuminate\Foundation\Http\FormRequest;

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
            'idTransformadorTrifasico' => ['required', 'integer', 'exists:transformadores_trifasicos,id']
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
            'idTransformadorTrifasico.required' => 'El campo :attribute es obligatorio.',
            'idTransformadorTrifasico.integer'  => 'El valor del campo :attribute debe ser un número entero.',
            'idTransformadorTrifasico.exists'   => 'El valor del campo :attribute debe existir en la base de datos.'
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
        ];
    }
}
