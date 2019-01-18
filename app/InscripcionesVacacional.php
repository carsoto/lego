<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 17 Jan 2019 21:23:09 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class InscripcionesVacacional
 * 
 * @property int $id
 * @property int $atletas_id
 * @property int $vacacional_horarios_id
 * @property float $tarifa
 * @property int $descuento
 * @property float $pago
 * @property \Carbon\Carbon $fecha_inscripcion
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Atleta $atleta
 * @property \App\VacacionalHorario $vacacional_horario
 *
 * @package App
 */
class InscripcionesVacacional extends Eloquent
{
	protected $table = 'inscripciones_vacacional';

	protected $casts = [
		'atletas_id' => 'int',
		'vacacional_horarios_id' => 'int',
		'tarifa' => 'float',
		'descuento' => 'int',
		'pago' => 'float',
		'activo' => 'int'
	];

	protected $dates = [
		'fecha_inscripcion'
	];

	protected $fillable = [
		'atletas_id',
		'vacacional_horarios_id',
		'tarifa',
		'descuento',
		'pago',
		'fecha_inscripcion',
		'activo'
	];

	public function atleta()
	{
		return $this->belongsTo(\App\Atleta::class, 'atletas_id');
	}

	public function vacacional_horario()
	{
		return $this->belongsTo(\App\VacacionalHorario::class, 'vacacional_horarios_id');
	}
}
