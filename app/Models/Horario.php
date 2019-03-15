<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 17 Jan 2019 21:23:09 +0000.
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
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Locacione $locacione
 *
 * @package App
 */
class Horario extends Eloquent
{
	protected $casts = [
		'locaciones_id' => 'int',
		'desde' => 'int',
		'hasta' => 'int'
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
