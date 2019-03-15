<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Mar 2019 16:02:26 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AlquilerInvitado
 * 
 * @property int $id
 * @property int $alquiler_id
 * @property int $invitados_id
 * @property int $responsable
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Alquiler $alquiler
 * @property \App\Invitado $invitado
 *
 * @package App
 */
class AlquilerInvitado extends Eloquent
{
	protected $casts = [
		'alquiler_id' => 'int',
		'invitados_id' => 'int',
		'responsable' => 'int'
	];

	protected $fillable = [
		'alquiler_id',
		'invitados_id',
		'responsable'
	];

	public function alquiler()
	{
		return $this->belongsTo(\App\Alquiler::class);
	}

	public function invitado()
	{
		return $this->belongsTo(\App\Invitado::class, 'invitados_id');
	}
}
