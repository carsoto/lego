<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Mar 2019 16:02:26 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Campamento
 * 
 * @property int $id
 * @property int $locaciones_id
 * @property string $descripcion
 * @property int $edad_inicio
 * @property int $edad_fin
 * @property int $porcentaje_individual
 * @property int $porcentaje_grupal
 * @property \Carbon\Carbon $fecha_limite
 * @property int $activo
 * @property string $imagen
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Locacione $locacione
 * @property \Illuminate\Database\Eloquent\Collection $campamentos_horarios
 *
 * @package App
 */
class Campamento extends Eloquent
{
	protected $casts = [
		'locaciones_id' => 'int',
		'edad_inicio' => 'int',
		'edad_fin' => 'int',
		'porcentaje_individual' => 'int',
		'porcentaje_grupal' => 'int',
		'activo' => 'int'
	];

	protected $dates = [
		'fecha_limite'
	];

	protected $fillable = [
		'locaciones_id',
		'descripcion',
		'edad_inicio',
		'edad_fin',
		'porcentaje_individual',
		'porcentaje_grupal',
		'fecha_limite',
		'activo',
		'imagen'
	];

	public function locacion()
	{
		return $this->belongsTo(\App\Locacion::class, 'locaciones_id');
	}

	public function campamentos_horarios()
	{
		return $this->hasMany(\App\CampamentosHorario::class, 'campamentos_id');
	}
}
