<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Models\WithCustomScopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
/**
 *@property int id
 *@property string tokenable_type
 *@property string intokenable_id
 *@property string name
 *@property string token
 *@property string abilities
 *@property string last_used_at
 *@property string created_at
 *@property string updated_at
 */

class PersonalAccessToken extends Model
{
    use HasFactory, WithCustomScopes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'personal_access_tokens';

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
        'tokenable_type',
        'intokenable_id',
        'name',
        'token',
        'abilities',
        'last_used_at',
        'created_at',
        'updated_at'
    ];
}
