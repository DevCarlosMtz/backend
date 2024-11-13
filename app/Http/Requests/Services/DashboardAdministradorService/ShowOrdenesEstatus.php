<?php

namespace App\Http\Requests\Services\DashboardAdministradorService;

use Illuminate\Foundation\Http\FormRequest;

class ShowOrdenesEstatus extends FormRequest
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
            'filtro' => ['required', 'integer'],
            'fechaIni' => ['nullable', 'date'],
            'fechaFin' => ['nullable', 'date'],
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
            'filtro.required' => 'El campo "filtro" es obligatorio.',
            'filtro.integer' => 'El campo "filtro" debe ser un número entero.',
            'fechaIni.date' => 'El campo "fechaInicio" debe ser una fecha válida.',
            'fechaFin.date' => 'El campo "fechaFin" debe ser una fecha válida.',

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
