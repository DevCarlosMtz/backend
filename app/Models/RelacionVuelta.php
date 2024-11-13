<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\WithCustomScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int id
 * @property float fase
 * @property float rojo
 * @property float negro
 * @property float tap_1
 * @property float tap_2
 * @property float tap_3
 * @property float tap_4
 * @property float tap_5
 * @property string created_at
 * @property string updated_at
 */
class RelacionVuelta extends Model
{
    use HasFactory, WithCustomScopes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'relaciones_vuelta';

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
        'id',
        'fase',
        'rojo',
        'negro',
        'tap_1',
        'tap_2',
        'tap_3',
        'tap_4',
        'tap_5',
        'created_at',
        'updated_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function transformadoresTrifasicos()
    {
        return $this->belongsToMany(
            TransformadorTrifasico::class, // Modelo con el que se relaciona
            RVuHTranTri::class, // Tabla pivote (Intermedia)
            'id_relaciones_vuelta', // Llave foránea de la tabla actual en la tabla pivote
            'id_transformadores_trifasicos' // Llave foránea del modelo con el que se relaciona en la tabla pivote
        );
    }
}
