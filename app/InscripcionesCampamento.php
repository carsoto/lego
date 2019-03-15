<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Mar 2019 16:02:26 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class InscripcionesCampamento
 * 
 * @property int $id
 * @property int $atletas_id
 * @property int $campamentos_horarios_id
 * @property float $tarifa
 * @property int $descuento
 * @property float $pago
 * @property string $estatus_pago
 * @property \Carbon\Carbon $fecha_inscripcion
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Atleta $atleta
 * @property \App\CampamentosHorario $campamentos_horario
 *
 * @package App
 */
class InscripcionesCampamento extends Eloquent
{
	protected $table = 'inscripciones_campamento';

	protected $casts = [
		'atletas_id' => 'int',
		'campamentos_horarios_id' => 'int',
		'tarifa' => 'float',
		'descuento' => 'int',
		'pago' => 'float',
		'activo' => 'int'
	];

	protected $dates = [
		'fecha_inscripcion'
	];

	protected $fillable = [
		'atletas_id',
		'campamentos_horarios_id',
		'tarifa',
		'descuento',
		'pago',
		'estatus_pago',
		'fecha_inscripcion',
		'activo'
	];

	public function atleta()
	{
		return $this->belongsTo(\App\Atleta::class, 'atletas_id');
	}

	public function campamentos_horario()
	{
		return $this->belongsTo(\App\CampamentosHorario::class, 'campamentos_horarios_id');
	}
}
