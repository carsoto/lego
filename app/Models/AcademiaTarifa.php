<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 21 Feb 2019 20:32:03 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AcademiaTarifa
 * 
 * @property int $id
 * @property string $frecuencia
 * @property int $cant_clases
 * @property float $tarifa_individual
 * @property float $tarifa_dupla
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $academia_horarios_disponibles
 *
 * @package App
 */
class AcademiaTarifa extends Eloquent
{
	protected $casts = [
		'cant_clases' => 'int',
		'tarifa_individual' => 'float',
		'tarifa_dupla' => 'float',
		'activo' => 'int'
	];

	protected $fillable = [
		'frecuencia',
		'cant_clases',
		'tarifa_individual',
		'tarifa_dupla',
		'activo'
	];

	public function academia_horarios_disponibles()
	{
		return $this->hasMany(\App\AcademiaHorariosDisponible::class, 'academia_tarifas_id');
	}
}