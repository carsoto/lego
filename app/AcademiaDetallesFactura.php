<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 15 Mar 2019 18:29:57 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AcademiaDetallesFactura
 * 
 * @property int $id
 * @property int $academia_factura_id
 * @property int $inscripciones_academia_id
 * @property float $pago
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\AcademiaFactura $academia_factura
 * @property \App\InscripcionesAcademium $inscripciones_academium
 *
 * @package App
 */
class AcademiaDetallesFactura extends Eloquent
{
	protected $table = 'academia_detalles_factura';

	protected $casts = [
		'academia_factura_id' => 'int',
		'inscripciones_academia_id' => 'int',
		'pago' => 'float'
	];

	protected $fillable = [
		'academia_factura_id',
		'inscripciones_academia_id',
		'pago'
	];

	public function academia_factura()
	{
		return $this->belongsTo(\App\AcademiaFactura::class);
	}

	public function inscripciones_academia()
	{
		return $this->belongsTo(\App\InscripcionesAcademia::class, 'inscripciones_academia_id');
	}
}
