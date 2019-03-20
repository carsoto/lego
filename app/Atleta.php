<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 20 Mar 2019 19:48:34 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Atleta
 * 
 * @property int $id
 * @property int $cedula
 * @property string $nombre
 * @property string $apellido
 * @property \Carbon\Carbon $fecha_nacimiento
 * @property string $red_social
 * @property string $telf_contacto
 * @property string $talla_top
 * @property string $talla_camiseta
 * @property string $instituto
 * @property string $email
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $academia_asistencias
 * @property \Illuminate\Database\Eloquent\Collection $informacion_adicionals
 * @property \Illuminate\Database\Eloquent\Collection $uniformes
 * @property \Illuminate\Database\Eloquent\Collection $inscripciones_academia
 * @property \Illuminate\Database\Eloquent\Collection $inscripciones_campamentos
 * @property \Illuminate\Database\Eloquent\Collection $inscripciones_vacacionals
 * @property \Illuminate\Database\Eloquent\Collection $representantes
 *
 * @package App
 */
class Atleta extends Eloquent
{
	protected $casts = [
		'cedula' => 'int'
	];

	protected $dates = [
		'fecha_nacimiento'
	];

	protected $fillable = [
		'cedula',
		'nombre',
		'apellido',
		'fecha_nacimiento',
		'red_social',
		'telf_contacto',
		'talla_top',
		'talla_camiseta',
		'instituto',
		'email'
	];

	public function academia_asistencias()
	{
		return $this->hasMany(\App\AcademiaAsistencia::class, 'atletas_id');
	}

	public function informacion_adicional()
	{
		return $this->belongsToMany(\App\InformacionAdicional::class, 'atletas_informacion_adicional', 'atletas_id')
					->withPivot('id', 'respuesta')
					->withTimestamps();
	}

	public function uniformes()
	{
		return $this->belongsToMany(\App\Uniforme::class, 'atletas_uniformes', 'atletas_id', 'uniformes_id')
					->withPivot('id', 'tallas_id')
					->withTimestamps();
	}

	public function inscripciones_academia()
	{
		return $this->hasMany(\App\InscripcionesAcademia::class, 'atletas_id');
	}

	public function inscripciones_campamentos()
	{
		return $this->hasMany(\App\InscripcionesCampamento::class, 'atletas_id');
	}

	public function inscripciones_vacacional()
	{
		return $this->hasMany(\App\InscripcionesVacacional::class, 'atletas_id');
	}

	public function representantes()
	{
		return $this->belongsToMany(\App\Representante::class, 'representantes_atletas', 'atletas_id', 'representantes_id')
					->withPivot('id')
					->withTimestamps();
	}
}
