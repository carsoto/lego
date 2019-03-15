<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 17 Jan 2019 21:23:09 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AtletasInformacionAdicional
 * 
 * @property int $id
 * @property int $atletas_id
 * @property int $informacion_adicional_id
 * @property string $respuesta
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Atleta $atleta
 * @property \App\InformacionAdicional $informacion_adicional
 *
 * @package App
 */
class AtletasInformacionAdicional extends Eloquent
{
	protected $table = 'atletas_informacion_adicional';

	protected $casts = [
		'atletas_id' => 'int',
		'informacion_adicional_id' => 'int'
	];

	protected $fillable = [
		'atletas_id',
		'informacion_adicional_id',
		'respuesta'
	];

	public function atleta()
	{
		return $this->belongsTo(\App\Atleta::class, 'atletas_id');
	}

	public function informacion_adicional()
	{
		return $this->belongsTo(\App\InformacionAdicional::class);
	}
}
