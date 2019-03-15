<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 15 Mar 2019 18:30:12 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AcademiaFacturaAbono
 * 
 * @property int $id
 * @property int $users_id
 * @property int $academia_factura_id
 * @property \Carbon\Carbon $fecha
 * @property float $monto
 * @property string $tipo_pago
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\AcademiaFactura $academia_factura
 * @property \App\User $user
 *
 * @package App
 */
class AcademiaFacturaAbono extends Eloquent
{
	protected $casts = [
		'users_id' => 'int',
		'academia_factura_id' => 'int',
		'monto' => 'float'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'users_id',
		'academia_factura_id',
		'fecha',
		'monto',
		'tipo_pago'
	];

	public function academia_factura()
	{
		return $this->belongsTo(\App\AcademiaFactura::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}
}
