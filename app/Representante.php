<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 04 Jan 2019 19:14:08 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Representante
 * 
 * @property int $id
 * @property int $cedula
 * @property string $nombres
 * @property string $apellidos
 * @property string $direccion
 * @property string $telf_contacto
 * @property string $email
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $atletas
 * @property \Illuminate\Database\Eloquent\Collection $redes_sociales
 *
 * @package App
 */
class Representante extends Eloquent
{
	protected $casts = [
		'cedula' => 'int'
	];

	protected $fillable = [
		'cedula',
		'nombres',
		'apellidos',
		'direccion',
		'telf_contacto',
		'email'
	];

	public function atletas()
	{
		return $this->belongsToMany(\App\Atleta::class, 'representantes_atletas', 'representantes_id', 'atletas_id')
					->withTimestamps();
	}

	public function redes_sociales()
	{
		return $this->belongsToMany(\App\RedesSociales::class, 'representantes_redes_sociales', 'representantes_id', 'redes_sociales_id')
					->withTimestamps();
	}
}
