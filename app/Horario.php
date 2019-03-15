<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Mar 2019 16:02:26 +0000.
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

	public function locacion()
	{
		return $this->belongsTo(\App\Locacion::class, 'locaciones_id');
	}
}
