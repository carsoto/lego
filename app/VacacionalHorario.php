<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Mar 2019 16:02:26 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class VacacionalHorario
 * 
 * @property int $id
 * @property int $vacacional_id
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property float $tarifa_ins
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Vacacional $vacacional
 * @property \Illuminate\Database\Eloquent\Collection $inscripciones_vacacionals
 *
 * @package App
 */
class VacacionalHorario extends Eloquent
{
	protected $casts = [
		'vacacional_id' => 'int',
		'tarifa_ins' => 'float',
		'activo' => 'int'
	];

	protected $fillable = [
		'vacacional_id',
		'hora_inicio',
		'hora_fin',
		'tarifa_ins',
		'activo'
	];

	public function vacacional()
	{
		return $this->belongsTo(\App\Vacacional::class);
	}

	public function inscripciones_vacacionals()
	{
		return $this->hasMany(\App\InscripcionesVacacional::class, 'vacacional_horarios_id');
	}
}
