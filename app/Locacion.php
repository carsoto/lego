<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 02 Jan 2019 18:34:18 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Locacione
 * 
 * @property int $id
 * @property string $ubicacion
 * @property string $direccion
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $tarifas
 *
 * @package App
 */
class Locacion extends Eloquent
{
	protected $table = 'locaciones';
	
	protected $casts = [
		'activo' => 'int'
	];

	protected $fillable = [
		'ubicacion',
		'direccion',
		'activo'
	];

	public function campamentos()
	{
		return $this->hasMany(\App\Campamento::class, 'locaciones_id');
	}

	public function horarios()
	{
		return $this->hasMany(\App\Horario::class, 'locaciones_id');
	}

	public function tarifas()
	{
		return $this->hasMany(\App\Tarifa::class, 'locaciones_id');
	}

	public function vacacional()
	{
		return $this->hasMany(\App\Vacacional::class, 'locaciones_id');
	}
}
