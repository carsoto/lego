<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 21 Feb 2019 20:32:35 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AcademiaMatricula
 * 
 * @property int $id
 * @property int $inscripciones_academia_id
 * @property int $academia_horarios_disponibles_id
 * @property \Carbon\Carbon $fecha
 * @property int $mes
 * @property int $anyo
 * @property string $dias_asistencia
 * @property string $codigo_dupla
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\AcademiaHorariosDisponible $academia_horarios_disponible
 * @property \App\InscripcionesAcademium $inscripciones_academium
 *
 * @package App
 */
class AcademiaMatricula extends Eloquent
{
	protected $table = 'academia_matricula';

	protected $casts = [
		'inscripciones_academia_id' => 'int',
		'academia_horarios_disponibles_id' => 'int',
		'mes' => 'int',
		'anyo' => 'int',
		'activo' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'inscripciones_academia_id',
		'academia_horarios_disponibles_id',
		'fecha',
		'mes',
		'anyo',
		'dias_asistencia',
		'codigo_dupla',
		'activo'
	];

	public function academia_horarios_disponible()
	{
		return $this->belongsTo(\App\AcademiaHorariosDisponible::class, 'academia_horarios_disponibles_id');
	}

	public function inscripciones_academium()
	{
		return $this->belongsTo(\App\InscripcionesAcademium::class, 'inscripciones_academia_id');
	}
}
