<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $descripcion
 * @property User[] $users
 */
class Rol extends Model
{
    public static $ADMINISTRADOR = 1;
    public static $POSTULANTE = 2;
    public static $RESPONSABLE_ADMINISTRATIVO = 3;
    
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'rol';

    /**
     * @var array
     */
    protected $fillable = ['descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User', 'id_rol');
    }
}
