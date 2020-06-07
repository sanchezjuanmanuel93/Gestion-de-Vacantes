<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $id_materia
 * @property string $nombre_puesto
 * @property string $descripcion_puesto
 * @property string $fecha_apertura
 * @property string $fecha_cierre_estipulada
 * @property string $fecha_cierre
 * @property string $fecha_orden_merito
 * @property Materium $materium
 * @property Postulacion[] $postulacions
 */
class Vacante extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'vacante';

    /**
     * @var array
     */
    protected $fillable = ['id_materia', 'nombre_puesto', 'descripcion_puesto', 'fecha_apertura', 'fecha_cierre_estipulada', 'fecha_cierre', 'fecha_orden_merito'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materium()
    {
        return $this->belongsTo('App\Materium', 'id_materia');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postulacions()
    {
        return $this->hasMany('App\Postulacion', 'id_vacante');
    }
}
