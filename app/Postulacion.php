<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_vacante
 * @property string $fecha_postulacion
 * @property int $puntaje
 * @property integer $id_usuario
 * @property Vacante $vacante
 */
class Postulacion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'postulacion';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['id_vacante', 'fecha_postulacion', 'puntaje', 'id_usuario'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vacante()
    {
        return $this->belongsTo('App\Vacante', 'id_vacante');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo('App\User', 'id_usuario');
    }
}
