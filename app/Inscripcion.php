<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 02 Jan 2019 18:34:18 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Inscripcione
 * 
 * @property int $id
 * @property int $atletas_id
 * @property int $tarifas_id
 * @property int $promociones_id
 * @property \Carbon\Carbon $fecha_inicio
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Atleta $atleta
 * @property \App\Promocione $promocione
 * @property \App\Tarifa $tarifa
 *
 * @package App
 */
class Inscripcion extends Eloquent
{
	protected $casts = [
		'atletas_id' => 'int',
		'tarifas_id' => 'int',
		'promociones_id' => 'int'
	];

	protected $dates = [
		'fecha_inicio'
	];

	protected $fillable = [
		'atletas_id',
		'tarifas_id',
		'promociones_id',
		'fecha_inicio'
	];

	public function atleta()
	{
		return $this->belongsTo(\App\Atleta::class, 'atletas_id');
	}

	public function promocione()
	{
		return $this->belongsTo(\App\Promocion::class, 'promociones_id');
	}

	public function tarifa()
	{
		return $this->belongsTo(\App\Tarifa::class, 'tarifas_id');
	}
}
