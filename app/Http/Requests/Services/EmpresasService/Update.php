<?php

namespace App\Http\Requests\Services\EmpresasService;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @property int id
 * @property mixed|null foto
 * @property string nombre
 * @property string rfc
 * @property string responsable
 * @property string domicilio_fiscal
 * @property string logo
 * @property string dominio
 * @property string aviso_privacidad
 * @property int telefono
 */
class Update extends FormRequest
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
            "id"                => ["required", "integer","exists:empresas,id"],
            'foto'              => ['nullable', 'file', 'image', 'mimes:jpg,jpeg,png'],
            "nombre"            => ["required", "string", "max:255"],
            "rfc"               => ["required", "string", "max:13"],
            "responsable"       => ["required", "string", "max:255"],
            "domicilio_fiscal"  => ["required", "string", "max:255"],
            "dominio"           => ["nullable", "string", "max:45"],
            "aviso_privacidad"  => ["nullable", "string"],
            "telefono"          => ["required", "integer"],
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
            "id.required"                           =>"El :attribute es requerido",
            "id.integer"                            =>"El :attribute debe ser un numero entero",
            "id.exists"                             => "El :attribute debe de existir en la base de datos",
            'foto.file'                             => 'El campo :attribute debe ser un archivo',
            'foto.image'                            => 'El campo :attribute debe ser una imagen',
            'foto.mimes'                            => 'El campo :attribute debe ser de tipo jpg, jpeg o png',
            "nombre.required"                       => "El :atributo es requerido",
            "nombre.string"                         => "El :nombre debe ser una cadena de texto",
            "nombre.max"                            => "El nombre no puede tener mas de 50 caracteres",
            "rfc.required"                          => "El :RFC debe ser una cadena de texto",
            "rfc.string"                            => "El :RFC de ser una cadena de texto",
            "rfc.max"                               => "El :RFC no puede contener las de 13 caracteres",
            "responsable.required"                  => "El :reponsable es requerido",
            "responsable.string"                    => "El :reponsable debe ser una cadena de texto",
            "domicilio_fiscal.required"             => "El :domicilio fiscal es requerido",
            "domicilio_fiscal.string"               => "El :domicilio discal debe ser una cadena de texto",
            "dominio.string"                        => "El :dominio debe ser una cadena de texto",
            "dominio.max"                           => "El :dominio no puede contener mas de 45 caracteres",
            "aviso_privacidad.string"               => "El :aviso de privacidad debe ser una cadena de texto",
            "telefono.required"                     => "El :el atributo es requerido",
            "telefono.integer"                      => "El :telefono debe ser de tipo entero",
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
            "id"                =>"Identificador de la empresa",
            "nombre"            => "Nombre de empresa",
            "rfc"               => "RFC",
            "responsable"       => "Responsable",
            "domicilio_fiscal"  => "dom",
            "logo"              => "logossssss",
            "aviso_privacidad"  => "legal",
            "telefono"          => "numero"
        ];
    }
}
