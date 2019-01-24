<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 23 Jan 2019 16:53:13 +0000.
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
}
