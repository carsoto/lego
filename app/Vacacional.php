<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Mar 2019 16:02:26 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Vacacional
 * 
 * @property int $id
 * @property int $locaciones_id
 * @property \Carbon\Carbon $fecha_inicio
 * @property \Carbon\Carbon $fecha_fin
 * @property \Carbon\Carbon $fecha_limite
 * @property int $edad_inicio
 * @property int $edad_fin
 * @property int $porcentaje_individual
 * @property int $porcentaje_grupal
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Locacione $locacione
 * @property \Illuminate\Database\Eloquent\Collection $vacacional_horarios
 *
 * @package App
 */
class Vacacional extends Eloquent
{
	protected $table = 'vacacional';

	protected $casts = [
		'locaciones_id' => 'int',
		'edad_inicio' => 'int',
		'edad_fin' => 'int',
		'porcentaje_individual' => 'int',
		'porcentaje_grupal' => 'int',
		'activo' => 'int'
	];

	protected $dates = [
		'fecha_inicio',
		'fecha_fin',
		'fecha_limite'
	];

	protected $fillable = [
		'locaciones_id',
		'fecha_inicio',
		'fecha_fin',
		'fecha_limite',
		'edad_inicio',
		'edad_fin',
		'porcentaje_individual',
		'porcentaje_grupal',
		'activo'
	];

	public function locacion()
	{
		return $this->belongsTo(\App\Locacion::class, 'locaciones_id');
	}

	public function vacacional_horarios()
	{
		return $this->hasMany(\App\VacacionalHorario::class);
	}
}
