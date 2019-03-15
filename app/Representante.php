<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Mar 2019 16:02:26 +0000.
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
 * @property string $telf_contacto
 * @property string $email
 * @property string $red_social
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $atletas
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
		'telf_contacto',
		'email',
		'red_social'
	];

	public function atletas()
	{
		return $this->belongsToMany(\App\Atleta::class, 'representantes_atletas', 'representantes_id', 'atletas_id')
					->withPivot('id')
					->withTimestamps();
	}
}
