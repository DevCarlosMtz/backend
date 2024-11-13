<?php

namespace App\Http\Requests\Services\EmpresasService;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @property string nombre
 * @property string rfc
 * @property string reponsable
 * @property string domicilioFiscal
 * @property string logo
 * @property string dominio
 * @property string avisoPrivacidad
 * @property string telefono
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
