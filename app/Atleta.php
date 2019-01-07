<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 07 Jan 2019 17:42:19 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Atleta
 * 
 * @property int $id
 * @property int $cedula
 * @property string $nombres
 * @property string $apellidos
 * @property string $genero
 * @property \Carbon\Carbon $fecha_nacimiento
 * @property string $telf_contacto
 * @property string $direccion
 * @property string $colegio
 * @property string $email
 * @property int $talla_top
 * @property int $talla_camiseta
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $informacion_adicionals
 * @property \Illuminate\Database\Eloquent\Collection $redes_sociales
 * @property \Illuminate\Database\Eloquent\Collection $representantes
 *
 * @package App
 */
class Atleta extends Eloquent
{
	protected $casts = [
		'cedula' => 'int',
		'talla_top' => 'int',
		'talla_camiseta' => 'int'
	];

	protected $dates = [
		'fecha_nacimiento'
	];

	protected $fillable = [
		'cedula',
		'nombres',
		'apellidos',
		'genero',
		'fecha_nacimiento',
		'telf_contacto',
		'direccion',
		'colegio',
		'email',
		'talla_top',
		'talla_camiseta'
	];

	public function informacion_adicional()
	{
		return $this->belongsToMany(\App\InformacionAdicional::class, 'atletas_informacion_adicional', 'atletas_id')
					->withPivot('respuesta')
					->withTimestamps();
	}

	public function redes_sociales()
	{
		return $this->belongsToMany(\App\RedesSociales::class, 'atletas_redes_sociales', 'atletas_id', 'redes_sociales_id')
					->withTimestamps();
	}

	public function representantes()
	{
		return $this->belongsToMany(\App\Representante::class, 'representantes_atletas', 'atletas_id', 'representantes_id')
					->withTimestamps();
	}
}
