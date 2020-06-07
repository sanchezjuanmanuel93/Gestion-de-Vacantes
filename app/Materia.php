<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property Vacante[] $vacantes
 */
class Materia extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'materia';

    /**
     * @var array
     */
    protected $fillable = ['nombre', 'descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vacantes()
    {
        return $this->hasMany('App\Vacante', 'id_materia');
    }
}
