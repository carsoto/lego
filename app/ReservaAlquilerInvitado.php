<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 30 Jan 2019 23:02:33 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ReservaAlquilerInvitado
 * 
 * @property int $id
 * @property int $reserva_alquiler_id
 * @property int $reserva_invitados_id
 * @property int $responsable
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\ReservaAlquiler $reserva_alquiler
 * @property \App\ReservaInvitado $reserva_invitado
 *
 * @package App
 */
class ReservaAlquilerInvitado extends Eloquent
{
	protected $casts = [
		'reserva_alquiler_id' => 'int',
		'reserva_invitados_id' => 'int',
		'responsable' => 'int'
	];

	protected $fillable = [
		'reserva_alquiler_id',
		'reserva_invitados_id',
		'responsable'
	];

	public function reserva_alquiler()
	{
		return $this->belongsTo(\App\ReservaAlquiler::class);
	}

	public function reserva_invitado()
	{
		return $this->belongsTo(\App\ReservaInvitado::class, 'reserva_invitados_id');
	}
}
