<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 23 Jan 2019 16:53:36 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CampamentosFecha
 * 
 * @property int $id
 * @property int $campamentos_horarios_id
 * @property \Carbon\Carbon $fecha_inicio
 * @property \Carbon\Carbon $fecha_fin
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\CampamentosHorario $campamentos_horario
 *
 * @package App
 */
class CampamentosFecha extends Eloquent
{
	protected $casts = [
		'campamentos_horarios_id' => 'int'
	];

	protected $dates = [
		'fecha_inicio',
		'fecha_fin'
	];

	protected $fillable = [
		'campamentos_horarios_id',
		'fecha_inicio',
		'fecha_fin'
	];

	public function campamentos_horario()
	{
		return $this->belongsTo(\App\CampamentosHorario::class, 'campamentos_horarios_id');
	}
}
