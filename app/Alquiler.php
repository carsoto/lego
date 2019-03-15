<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Mar 2019 16:02:26 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Alquiler
 * 
 * @property int $id
 * @property int $locaciones_id
 * @property \Carbon\Carbon $fecha
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property int $cancha
 * @property string $status
 * @property float $pago
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Locacione $locacione
 * @property \Illuminate\Database\Eloquent\Collection $invitados
 *
 * @package App
 */
class Alquiler extends Eloquent
{
	protected $table = 'alquiler';

	protected $casts = [
		'locaciones_id' => 'int',
		'cancha' => 'int',
		'pago' => 'float'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'locaciones_id',
		'fecha',
		'hora_inicio',
		'hora_fin',
		'cancha',
		'status',
		'pago'
	];

	public function locacion()
	{
		return $this->belongsTo(\App\Locacion::class, 'locaciones_id');
	}

	public function invitados()
	{
		return $this->belongsToMany(\App\Invitado::class, 'alquiler_invitados', 'alquiler_id', 'invitados_id')
					->withPivot('id', 'responsable')
					->withTimestamps();
	}
}
