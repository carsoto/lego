<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Mar 2019 16:02:26 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $academia_horarios_disponibles
 * @property \Illuminate\Database\Eloquent\Collection $alquilers
 * @property \Illuminate\Database\Eloquent\Collection $campamentos
 * @property \Illuminate\Database\Eloquent\Collection $horarios
 * @property \Illuminate\Database\Eloquent\Collection $inscripciones_academia
 * @property \Illuminate\Database\Eloquent\Collection $tarifas
 * @property \Illuminate\Database\Eloquent\Collection $vacacionals
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

	public function academia_horarios_disponibles()
	{
		return $this->hasMany(\App\AcademiaHorariosDisponible::class, 'locaciones_id');
	}

	public function alquileres()
	{
		return $this->hasMany(\App\Alquiler::class, 'locaciones_id');
	}

	public function campamentos()
	{
		return $this->hasMany(\App\Campamento::class, 'locaciones_id');
	}

	public function horarios()
	{
		return $this->hasMany(\App\Horario::class, 'locaciones_id');
	}

	public function inscripciones_academia()
	{
		return $this->hasMany(\App\InscripcionesAcademia::class, 'locaciones_id');
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
