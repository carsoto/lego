<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 29 Jan 2019 20:46:33 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ReservaAlquiler
 * 
 * @property int $id
 * @property \Carbon\Carbon $fecha
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property string $status
 * @property float $pago
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $reserva_alquiler_invitados
 *
 * @package App
 */
class ReservaAlquiler extends Eloquent
{
	protected $table = 'reserva_alquiler';

	protected $casts = [
		'pago' => 'float'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'fecha',
		'hora_inicio',
		'hora_fin',
		'status',
		'pago'
	];

	public function reserva_alquiler_invitados()
	{
		return $this->hasMany(\App\ReservaAlquilerInvitado::class);
	}
}
