<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Mar 2019 16:02:26 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Talla
 * 
 * @property int $id
 * @property string $descripcion
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $academia_uniformes
 * @property \Illuminate\Database\Eloquent\Collection $atletas_uniformes
 *
 * @package App
 */
class Talla extends Eloquent
{
	protected $fillable = [
		'descripcion'
	];

	public function academia_uniformes()
	{
		return $this->hasMany(\App\AcademiaUniforme::class, 'tallas_id');
	}

	public function atletas_uniformes()
	{
		return $this->hasMany(\App\AtletasUniforme::class, 'tallas_id');
	}
}
