<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 21 Feb 2019 20:31:51 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AcademiaHorario
 * 
 * @property int $id
 * @property int $edad_inicio
 * @property int $edad_fin
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $academia_horarios_disponibles
 *
 * @package App
 */
class AcademiaHorario extends Eloquent
{
	protected $casts = [
		'edad_inicio' => 'int',
		'edad_fin' => 'int',
		'activo' => 'int'
	];

	protected $fillable = [
		'edad_inicio',
		'edad_fin',
		'hora_inicio',
		'hora_fin',
		'activo'
	];

	public function academia_horarios_disponibles()
	{
		return $this->hasMany(\App\AcademiaHorariosDisponible::class, 'academia_horarios_id');
	}
}
