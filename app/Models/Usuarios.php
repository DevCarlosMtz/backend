<?php

namespace App\Models;

use App\Traits\Models\WithCustomScopes;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int id
 * @property string nombre
 * @property string ap_pat
 * @property string ap_mat
 * @property string email
 * @property string password
 * @property string password_confirmation
 * @property float sueldo
 * @property int id_perfiles
 * @property int id_empresas
 * @property \App\Models\Empresa empresas
 * @property \App\Models\Perfiles perfil
 */
class Usuarios extends Authenticatable implements JWTSubject
{
    use WithCustomScopes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usuarios';

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
        'foto',
        'nombre',
        'ap_pat',
        'ap_mat',
        'email',
        'password',
        'sueldo',
        'verify_email_at',
        'id_perfiles',
        'id_empresas',
        'id_puestos'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * Send accessors
     *
     * @var array
     */
    protected $appends = [
        'nombre_completo'
    ];

    /**
     * Obtiene el nombre completo del usuario
     *
     * @return string
     */
    public function getNombreCompletoAttribute()
    {
        return "{$this->nombre} {$this->ap_pat} {$this->ap_mat}";
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getId()
    {
      return $this->id;
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function perfil()
    {
        return $this->hasOne(Perfiles::class, 'id', 'id_perfiles');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function puesto()
    {
        return $this->hasOne(Puestos::class, 'id', 'id_puestos');
    }
    public function empresa()
    {
        return $this->hasOne(Empresa::class, 'id', 'id_empresas');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permisos()
    {
        return $this->belongsToMany(
            Permisos::class, // Modelo con el que se relaciona
            UsuarioHasPermisos::class, // Tabla pivote (Intermedia)
            'id_usuarios', // Llave foránea de la tabla actual en la tabla pivote
            'id_permisos' // Llave foránea del modelo con el que se relaciona en la tabla pivote
        );


    }

}
