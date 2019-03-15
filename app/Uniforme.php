<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Mar 2019 16:02:26 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Uniforme
 * 
 * @property int $id
 * @property string $descripcion
 * @property float $precio
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $academia_uniformes
 * @property \Illuminate\Database\Eloquent\Collection $atletas
 *
 * @package App
 */
class Uniforme extends Eloquent
{
	protected $casts = [
		'precio' => 'float'
	];

	protected $fillable = [
		'descripcion',
		'precio'
	];

	public function academia_uniformes()
	{
		return $this->hasMany(\App\AcademiaUniforme::class, 'uniformes_id');
	}

	public function atletas()
	{
		return $this->belongsToMany(\App\Atleta::class, 'atletas_uniformes', 'uniformes_id', 'atletas_id')
					->withPivot('id', 'tallas_id')
					->withTimestamps();
	}
}
