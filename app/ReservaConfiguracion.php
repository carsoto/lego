<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 29 Jan 2019 20:46:14 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ReservaConfiguracion
 * 
 * @property int $id
 * @property string $propiedad
 * @property string $valor
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App
 */
class ReservaConfiguracion extends Eloquent
{
	protected $table = 'reserva_configuracion';

	protected $fillable = [
		'propiedad',
		'valor'
	];
}
