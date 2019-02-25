<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 21 Feb 2019 20:31:16 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AcademiaConfiguracion
 * 
 * @property int $id
 * @property string $configuracion
 * @property string $valor
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App
 */
class AcademiaConfiguracion extends Eloquent
{
	protected $table = 'academia_configuracion';

	protected $fillable = [
		'configuracion',
		'valor'
	];
}
