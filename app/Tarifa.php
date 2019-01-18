<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 17 Jan 2019 21:23:09 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tarifa
 * 
 * @property int $id
 * @property int $deportes_id
 * @property int $locaciones_id
 * @property int $servicios_id
 * @property int $periodos_id
 * @property int $frecuencia
 * @property float $precio
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Deporte $deporte
 * @property \App\Locacione $locacione
 * @property \App\Periodo $periodo
 * @property \App\Servicio $servicio
 *
 * @package App
 */
class Tarifa extends Eloquent
{
	protected $casts = [
		'deportes_id' => 'int',
		'locaciones_id' => 'int',
		'servicios_id' => 'int',
		'periodos_id' => 'int',
		'frecuencia' => 'int',
		'precio' => 'float',
		'activo' => 'int'
	];

	protected $fillable = [
		'deportes_id',
		'locaciones_id',
		'servicios_id',
		'periodos_id',
		'frecuencia',
		'precio',
		'activo'
	];

	public function deporte()
	{
		return $this->belongsTo(\App\Deporte::class, 'deportes_id');
	}

	public function locacione()
	{
		return $this->belongsTo(\App\Locacione::class, 'locaciones_id');
	}

	public function periodo()
	{
		return $this->belongsTo(\App\Periodo::class, 'periodos_id');
	}

	public function servicio()
	{
		return $this->belongsTo(\App\Servicio::class, 'servicios_id');
	}
}
