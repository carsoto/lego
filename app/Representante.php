<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 02 Jan 2019 18:34:18 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Representante
 * 
 * @property int $id
 * @property string $nombres
 * @property string $apellidos
 * @property string $telf_contacto
 * @property string $direccion
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
	protected $fillable = [
		'nombres',
		'apellidos',
		'telf_contacto',
		'direccion',
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
