<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 17 Jan 2019 21:23:09 +0000.
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
 * @property string $genero
 * @property \Carbon\Carbon $fecha_nacimiento
 * @property string $red_social
 * @property string $telf_contacto
 * @property string $instituto
 * @property string $email
 * @property int $talla_top
 * @property int $talla_camiseta
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $informacion_adicionals
 * @property \Illuminate\Database\Eloquent\Collection $inscripciones_vacacionals
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
		'nombre',
		'apellido',
		'genero',
		'fecha_nacimiento',
		'red_social',
		'telf_contacto',
		'instituto',
		'email',
		'talla_top',
		'talla_camiseta'
	];

	public function academia_asistencia_pruebas()
	{
		return $this->hasMany(\App\AcademiaAsistenciaPrueba::class, 'atletas_id');
	}

	public function academia_matriculas()
	{
		return $this->hasMany(\App\AcademiaMatricula::class, 'atletas_id');
	}

	public function informacion_adicional()
	{
		return $this->belongsToMany(\App\InformacionAdicional::class, 'atletas_informacion_adicional', 'atletas_id')
					->withPivot('id', 'respuesta')
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
