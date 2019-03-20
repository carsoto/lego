<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 20 Mar 2019 19:47:37 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AcademiaAsistencia
 * 
 * @property int $id
 * @property int $users_id
 * @property int $atletas_id
 * @property \Carbon\Carbon $fecha
 * @property int $mes
 * @property int $anyo
 * @property int $locaciones_id
 * @property int $academia_horarios_id
 * @property string $modalidad
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\AcademiaHorario $academia_horario
 * @property \App\Atleta $atleta
 * @property \App\Locacione $locacione
 * @property \App\User $user
 *
 * @package App
 */
class AcademiaAsistencia extends Eloquent
{
	protected $casts = [
		'users_id' => 'int',
		'atletas_id' => 'int',
		'mes' => 'int',
		'anyo' => 'int',
		'locaciones_id' => 'int',
		'academia_horarios_id' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'users_id',
		'atletas_id',
		'fecha',
		'mes',
		'anyo',
		'locaciones_id',
		'academia_horarios_id',
		'modalidad'
	];

	public function academia_horario()
	{
		return $this->belongsTo(\App\AcademiaHorario::class, 'academia_horarios_id');
	}

	public function atleta()
	{
		return $this->belongsTo(\App\Atleta::class, 'atletas_id');
	}

	public function locacion()
	{
		return $this->belongsTo(\App\Locacion::class, 'locaciones_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}
}
