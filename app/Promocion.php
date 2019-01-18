<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 15 Jan 2019 19:36:19 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Promocione
 * 
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property float $valor
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App
 */
class Promocion extends Eloquent
{
	protected $casts = [
		'valor' => 'float',
		'activo' => 'int'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'valor',
		'activo'
	];
}
