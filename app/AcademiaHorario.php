<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 11 Feb 2019 16:03:19 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AcademiaHorario
 * 
 * @property int $id
 * @property int $locaciones_id
 * @property int $edad_inicio
 * @property int $edad_fin
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Locacione $locacione
 * @property \Illuminate\Database\Eloquent\Collection $academia_horarios_tarifas
 * @property \Illuminate\Database\Eloquent\Collection $inscripciones_academia
 *
 * @package App
 */
class AcademiaHorario extends Eloquent
{
	protected $casts = [
		'locaciones_id' => 'int',
		'edad_inicio' => 'int',
		'edad_fin' => 'int',
		'activo' => 'int'
	];

	protected $fillable = [
		'locaciones_id',
		'edad_inicio',
		'edad_fin',
		'hora_inicio',
		'hora_fin',
		'activo'
	];

	public function locacion()
	{
		return $this->belongsTo(\App\Locacion::class, 'locaciones_id');
	}

	public function academia_horarios_tarifas()
	{
		return $this->hasMany(\App\AcademiaHorariosTarifa::class, 'academia_horarios_id');
	}

	public function inscripciones_academia()
	{
		return $this->hasMany(\App\InscripcionesAcademia::class, 'prueba_horario_id');
	}
}
