<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 11 Feb 2019 16:03:35 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AcademiaMatricula
 * 
 * @property int $id
 * @property int $atletas_id
 * @property int $academia_horarios_tarifas_id
 * @property \Carbon\Carbon $fecha
 * @property int $mes
 * @property int $anyo
 * @property string $codigo_dupla
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\AcademiaHorariosTarifa $academia_horarios_tarifa
 * @property \App\Atleta $atleta
 *
 * @package App
 */
class AcademiaMatricula extends Eloquent
{
	protected $table = 'academia_matricula';

	protected $casts = [
		'atletas_id' => 'int',
		'academia_horarios_tarifas_id' => 'int',
		'mes' => 'int',
		'anyo' => 'int',
		'activo' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'atletas_id',
		'academia_horarios_tarifas_id',
		'fecha',
		'mes',
		'anyo',
		'codigo_dupla',
		'activo'
	];

	public function academia_horarios_tarifa()
	{
		return $this->belongsTo(\App\AcademiaHorariosTarifa::class, 'academia_horarios_tarifas_id');
	}

	public function atleta()
	{
		return $this->belongsTo(\App\Atleta::class, 'atletas_id');
	}
}
