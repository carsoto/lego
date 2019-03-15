<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Mar 2019 16:02:26 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AcademiaHorariosDisponible
 * 
 * @property int $id
 * @property int $academia_horarios_id
 * @property int $locaciones_id
 * @property int $academia_tarifas_id
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\AcademiaHorario $academia_horario
 * @property \App\AcademiaTarifa $academia_tarifa
 * @property \App\Locacione $locacione
 * @property \Illuminate\Database\Eloquent\Collection $academia_matriculas
 *
 * @package App
 */
class AcademiaHorariosDisponible extends Eloquent
{
	protected $casts = [
		'academia_horarios_id' => 'int',
		'locaciones_id' => 'int',
		'academia_tarifas_id' => 'int',
		'activo' => 'int'
	];

	protected $fillable = [
		'academia_horarios_id',
		'locaciones_id',
		'academia_tarifas_id',
		'activo'
	];

	public function academia_horario()
	{
		return $this->belongsTo(\App\AcademiaHorario::class, 'academia_horarios_id');
	}

	public function academia_tarifa()
	{
		return $this->belongsTo(\App\AcademiaTarifa::class, 'academia_tarifas_id');
	}

	public function locacion()
	{
		return $this->belongsTo(\App\Locacion::class, 'locaciones_id');
	}

	public function academia_matriculas()
	{
		return $this->hasMany(\App\AcademiaMatricula::class, 'academia_horarios_disponibles_id');
	}
}
