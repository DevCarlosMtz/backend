<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\WithCustomScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @property int id
 * @property string nombre
 * @property string rfc
 * @property string responsable
 * @property string domicilio_fiscal
 * @property string foto
 * @property string dominio
 * @property string aviso_privacidad
 * @property string telefono
 */
class Empresa extends Model
{
    use HasFactory, WithCustomScopes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'empresas';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Timestamps
     *
     * @var string
     */
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "foto",
        "nombre",
        "rfc",
        "responsable",
        "domicilio_fiscal",
        "dominio",
        "aviso_privacidad",
        "telefono",
    ];
}
