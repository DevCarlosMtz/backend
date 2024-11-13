<?php

namespace App\Http\Requests\Services\GaleriaService;

use Illuminate\Foundation\Http\FormRequest;

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
            "fotos"             => ['required', 'array'],
            'fotos.*'           => ['file', 'image', 'mimes:png,jpg,jpeg'],
            "ot"                => ['required', 'string', 'exists:ordenes_trabajo,ot'],
            'tipo_imagen'       => ['required', 'string'],
            'disk'              => ['required', 'string'],

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
