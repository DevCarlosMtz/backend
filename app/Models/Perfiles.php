<?php

namespace App\Models;

use App\Traits\Models\WithCustomScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string nombre
 */
class Perfiles extends Model
{
    use HasFactory, WithCustomScopes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'perfiles';

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
        'nombre'
    ];
}
 