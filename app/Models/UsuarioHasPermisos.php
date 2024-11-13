<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\WithCustomScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 * @property int id
 * @property int id_usuarios
 * @property int id_permisos
 * @property \App\Models\Usuarios
 * @property \App\Models\Permisos
 */
class UsuarioHasPermisos extends Model
{
    use HasFactory, WithCustomScopes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usuarios_has_permisos';

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
        'id_usuarios',
        'id_permisos'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(Usuarios::class, 'id_usuarios', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function permisos()
    {
        return $this->belongsTo(Permisos::class, 'id_permisos', 'id');
    }
}
