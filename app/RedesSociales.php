<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 04 Jan 2019 19:14:08 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RedesSociale
 * 
 * @property int $id
 * @property string $descripcion
 * @property string $icono
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $atletas
 * @property \Illuminate\Database\Eloquent\Collection $representantes
 *
 * @package App
 */
class RedesSociales extends Eloquent
{
	protected $casts = [
		'activo' => 'int'
	];

	protected $fillable = [
		'descripcion',
		'icono',
		'activo'
	];

	public function atletas()
	{
		return $this->belongsToMany(\App\Atleta::class, 'atletas_redes_sociales', 'redes_sociales_id', 'atletas_id')
					->withTimestamps();
	}

	public function representantes()
	{
		return $this->belongsToMany(\App\Representante::class, 'representantes_redes_sociales', 'redes_sociales_id', 'representantes_id')
					->withTimestamps();
	}
}
