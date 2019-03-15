<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Mar 2019 16:02:26 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AcademiaUniforme
 * 
 * @property int $id
 * @property int $uniformes_id
 * @property int $tallas_id
 * @property int $colores_id
 * @property string $imagen
 * @property int $en_stock
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Colore $colore
 * @property \App\Talla $talla
 * @property \App\Uniforme $uniforme
 *
 * @package App
 */
class AcademiaUniforme extends Eloquent
{
	protected $casts = [
		'uniformes_id' => 'int',
		'tallas_id' => 'int',
		'colores_id' => 'int',
		'en_stock' => 'int',
		'activo' => 'int'
	];

	protected $fillable = [
		'uniformes_id',
		'tallas_id',
		'colores_id',
		'imagen',
		'en_stock',
		'activo'
	];

	public function color()
	{
		return $this->belongsTo(\App\Color::class, 'colores_id');
	}

	public function talla()
	{
		return $this->belongsTo(\App\Talla::class, 'tallas_id');
	}

	public function uniforme()
	{
		return $this->belongsTo(\App\Uniforme::class, 'uniformes_id');
	}
}
