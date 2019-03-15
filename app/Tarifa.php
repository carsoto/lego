<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Mar 2019 16:02:26 +0000.
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

	public function locacion()
	{
		return $this->belongsTo(\App\Locacion::class, 'locaciones_id');
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
