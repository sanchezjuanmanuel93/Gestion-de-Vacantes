<?php

namespace App;

use Carbon\Carbon;
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
 * @property Materia $materia
 * @property Postulacion[] $postulaciones
 */
class Vacante extends Model
{

    public static $CREADA = 0;
    public static $ABIERTA = 1;
    public static $CERRADA = 2;
    public static $FINALIZADA = 3;
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
    public function materia()
    {
        return $this->belongsTo('App\Materia', 'id_materia');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postulaciones()
    {
        return $this->hasMany('App\Postulacion', 'id_vacante');
    }

    public function status()
    {
        $today = Carbon::today();
        if ($this->fecha_apertura > $today && $this->fecha_cierre < $today) {
            return Vacante::$ABIERTA;
        } else if ($this->fecha_orden_merito == null && $this->fecha_cierre < $today) {
            return Vacante::$CERRADA;
        } else if ($this->fecha_orden_merito != null && $this->fecha_cierre < $today) {
            return Vacante::$FINALIZADA;
        } else {
            return Vacante::$CREADA;
        }
    }
}
