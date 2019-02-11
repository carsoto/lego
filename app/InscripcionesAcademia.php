<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 11 Feb 2019 16:07:22 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class InscripcionesAcademium
 * 
 * @property int $id
 * @property int $atletas_id
 * @property \Carbon\Carbon $fecha_inscripcion
 * @property string $estatus
 * @property \Carbon\Carbon $prueba_fecha
 * @property int $prueba_locacion_id
 * @property int $prueba_horario_id
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Atleta $atleta
 * @property \App\AcademiaHorario $academia_horario
 * @property \App\Locacione $locacione
 *
 * @package App
 */
class InscripcionesAcademia extends Eloquent
{
	protected $casts = [
		'atletas_id' => 'int',
		'prueba_locacion_id' => 'int',
		'prueba_horario_id' => 'int',
		'activo' => 'int'
	];

	protected $dates = [
		'fecha_inscripcion',
		'prueba_fecha'
	];

	protected $fillable = [
		'atletas_id',
		'fecha_inscripcion',
		'estatus',
		'prueba_fecha',
		'prueba_locacion_id',
		'prueba_horario_id',
		'activo'
	];

	public function atleta()
	{
		return $this->belongsTo(\App\Atleta::class, 'atletas_id');
	}

	public function academia_horario()
	{
		return $this->belongsTo(\App\AcademiaHorario::class, 'prueba_horario_id');
	}

	public function locacion()
	{
		return $this->belongsTo(\App\Locacion::class, 'prueba_locacion_id');
	}
}
