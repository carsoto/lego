<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 02 Jan 2019 18:34:18 +0000.
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
 * @property \Illuminate\Database\Eloquent\Collection $inscripciones
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

	public function inscripciones()
	{
		return $this->hasMany(\App\Inscripcion::class, 'promociones_id');
	}
}
