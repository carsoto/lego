<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 11 Feb 2019 16:02:14 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AcademiaAsistenciaPrueba
 * 
 * @property int $id
 * @property int $users_id
 * @property int $atletas_id
 * @property \Carbon\Carbon $fecha
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Atleta $atleta
 * @property \App\User $user
 *
 * @package App
 */
class AcademiaAsistenciaPrueba extends Eloquent
{
	protected $casts = [
		'users_id' => 'int',
		'atletas_id' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'users_id',
		'atletas_id',
		'fecha'
	];

	public function atleta()
	{
		return $this->belongsTo(\App\Atleta::class, 'atletas_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}
}
