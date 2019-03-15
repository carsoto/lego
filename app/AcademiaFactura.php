<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 15 Mar 2019 18:29:43 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AcademiaFactura
 * 
 * @property int $id
 * @property int $representantes_id
 * @property \Carbon\Carbon $fecha
 * @property float $subtotal
 * @property float $descuento
 * @property float $total
 * @property string $status
 * @property string $tipo_pago
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Representante $representante
 * @property \Illuminate\Database\Eloquent\Collection $academia_detalles_facturas
 * @property \Illuminate\Database\Eloquent\Collection $academia_factura_abonos
 *
 * @package App
 */
class AcademiaFactura extends Eloquent
{
	protected $table = 'academia_factura';

	protected $casts = [
		'representantes_id' => 'int',
		'subtotal' => 'float',
		'descuento' => 'float',
		'total' => 'float'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'representantes_id',
		'fecha',
		'subtotal',
		'descuento',
		'total',
		'status',
		'tipo_pago'
	];

	public function representante()
	{
		return $this->belongsTo(\App\Representante::class, 'representantes_id');
	}

	public function academia_detalles_facturas()
	{
		return $this->hasMany(\App\AcademiaDetallesFactura::class);
	}

	public function academia_factura_abonos()
	{
		return $this->hasMany(\App\AcademiaFacturaAbono::class);
	}
}
