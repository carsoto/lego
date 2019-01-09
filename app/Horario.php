<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 09 Jan 2019 21:20:58 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Horario
 * 
 * @property int $id
 * @property int $locaciones_id
 * @property int $desde
 * @property int $hasta
 * @property \Carbon\Carbon $hora_inicio
 * @property \Carbon\Carbon $hora_fin
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Locacione $locacione
 *
 * @package App
 */
class Horario extends Eloquent
{
	protected $table = 'horarios';

	protected $casts = [
		'locaciones_id' => 'int',
		'desde' => 'int',
		'hasta' => 'int'
	];

	protected $dates = [
		'hora_inicio',
		'hora_fin'
	];

	protected $fillable = [
		'locaciones_id',
		'desde',
		'hasta',
		'hora_inicio',
		'hora_fin'
	];

	public function locacione()
	{
		return $this->belongsTo(\App\Locacione::class, 'locaciones_id');
	}
}
