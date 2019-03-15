<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Mar 2019 16:02:26 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Invitado
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
 * @property \Illuminate\Database\Eloquent\Collection $alquilers
 *
 * @package App
 */
class Invitado extends Eloquent
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

	public function alquileres()
	{
		return $this->belongsToMany(\App\Alquiler::class, 'alquiler_invitados', 'invitados_id')
					->withPivot('id', 'responsable')
					->withTimestamps();
	}
}
