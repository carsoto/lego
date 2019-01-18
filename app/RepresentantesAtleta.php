<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 17 Jan 2019 21:23:09 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RepresentantesAtleta
 * 
 * @property int $id
 * @property int $representantes_id
 * @property int $atletas_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Atleta $atleta
 * @property \App\Representante $representante
 *
 * @package App
 */
class RepresentantesAtleta extends Eloquent
{
	protected $casts = [
		'representantes_id' => 'int',
		'atletas_id' => 'int'
	];

	protected $fillable = [
		'representantes_id',
		'atletas_id'
	];

	public function atleta()
	{
		return $this->belongsTo(\App\Atleta::class, 'atletas_id');
	}

	public function representante()
	{
		return $this->belongsTo(\App\Representante::class, 'representantes_id');
	}
}
