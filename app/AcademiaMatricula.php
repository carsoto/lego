<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 25 Mar 2019 19:49:24 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AcademiaMatricula
 * 
 * @property int $id
 * @property int $inscripciones_academia_id
 * @property int $academia_horarios_id
 * @property \Carbon\Carbon $fecha
 * @property int $cantd_clases
 * @property int $mes
 * @property int $anyo
 * @property string $dias_asistencia
 * @property string $codigo_dupla
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\AcademiaHorario $academia_horario
 * @property \App\InscripcionesAcademium $inscripciones_academium
 *
 * @package App
 */
class AcademiaMatricula extends Eloquent
{
	protected $table = 'academia_matricula';

	protected $casts = [
		'inscripciones_academia_id' => 'int',
		'academia_horarios_id' => 'int',
		'cantd_clases' => 'int',
		'mes' => 'int',
		'anyo' => 'int',
		'activo' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'inscripciones_academia_id',
		'academia_horarios_id',
		'fecha',
		'cantd_clases',
		'mes',
		'anyo',
		'dias_asistencia',
		'codigo_dupla',
		'activo'
	];

	public function academia_horario()
	{
		return $this->belongsTo(\App\AcademiaHorario::class, 'academia_horarios_id');
	}

	public function inscripciones_academia()
	{
		return $this->belongsTo(\App\InscripcionesAcademia::class, 'inscripciones_academia_id');
	}
}
