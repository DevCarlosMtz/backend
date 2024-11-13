<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\WithCustomScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int id
 * @property string nombre_modulo
 */
class Permisos extends Model
{
    use HasFactory, WithCustomScopes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permisos';

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
        'nombre_modulo',
        'url',
        'icono',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function usuarios()
    {
        return $this->belongsToMany(
            Usuarios::class, // Modelo con el que se relaciona
            UsuarioHasPermisos::class, // Tabla pivote (Intermedia)
            'id_permisos', // Llave foránea de la tabla actual en la tabla pivote
            'id_usuario' // Llave foránea del modelo con el que se relaciona en la tabla pivote
        );
    }
}
