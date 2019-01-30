<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 30 Jan 2019 04:02:46 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ReservaInvitado
 * 
 * @property int $id
 * @property int $cedula
 * @property string $nombres
 * @property string $apellidos
 * @property string $email
 * @property string $telefono
 * @property string $red_social
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $reserva_alquiler_invitados
 *
 * @package App
 */
class ReservaInvitado extends Eloquent
{
	protected $casts = [
		'cedula' => 'int',
		'activo' => 'int'
	];

	protected $fillable = [
		'cedula',
		'nombres',
		'apellidos',
		'email',
		'telefono',
		'red_social',
		'activo'
	];

	public function reserva_alquiler_invitados()
	{
		return $this->hasMany(\App\ReservaAlquilerInvitado::class, 'reserva_invitados_id');
	}
}
