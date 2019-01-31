<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 31 Jan 2019 15:47:46 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Alquiler
 * 
 * @property int $id
 * @property \Carbon\Carbon $fecha
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property int $cancha
 * @property string $status
 * @property float $pago
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $invitados
 *
 * @package App
 */
class Alquiler extends Eloquent
{
	protected $table = 'alquiler';

	protected $casts = [
		'cancha' => 'int',
		'pago' => 'float'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'fecha',
		'hora_inicio',
		'hora_fin',
		'cancha',
		'status',
		'pago'
	];

	public function invitados()
	{
		return $this->belongsToMany(\App\Invitado::class, 'alquiler_invitados', 'alquiler_id', 'invitados_id')
					->withPivot('id')
					->withTimestamps();
	}
}
