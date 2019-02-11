<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 11 Feb 2019 16:02:27 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AcademiaConfiguracion
 * 
 * @property int $id
 * @property string $tipo
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
		'tipo',
		'configuracion',
		'valor'
	];
}
