<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Mar 2019 16:02:26 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CampamentosHorario
 * 
 * @property int $id
 * @property int $campamentos_id
 * @property string $descripcion
 * @property float $tarifa_ins
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Campamento $campamento
 * @property \Illuminate\Database\Eloquent\Collection $campamentos_fechas
 * @property \Illuminate\Database\Eloquent\Collection $inscripciones_campamentos
 *
 * @package App
 */
class CampamentosHorario extends Eloquent
{
	protected $casts = [
		'campamentos_id' => 'int',
		'tarifa_ins' => 'float',
		'activo' => 'int'
	];

	protected $fillable = [
		'campamentos_id',
		'descripcion',
		'tarifa_ins',
		'activo'
	];

	public function campamento()
	{
		return $this->belongsTo(\App\Campamento::class, 'campamentos_id');
	}

	public function campamentos_fechas()
	{
		return $this->hasMany(\App\CampamentosFecha::class, 'campamentos_horarios_id');
	}

	public function inscripciones_campamentos()
	{
		return $this->hasMany(\App\InscripcionesCampamento::class, 'campamentos_horarios_id');
	}
}
