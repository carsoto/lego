<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 21 Feb 2019 20:32:23 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class InscripcionesAcademium
 * 
 * @property int $id
 * @property int $atletas_id
 * @property \Carbon\Carbon $fecha_inscripcion
 * @property string $estatus
 * @property \Carbon\Carbon $prueba_fecha
 * @property int $activo
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Atleta $atleta
 * @property \Illuminate\Database\Eloquent\Collection $academia_matriculas
 *
 * @package App
 */
class InscripcionesAcademia extends Eloquent
{
	protected $table = 'inscripciones_academia';

	protected $casts = [
		'atletas_id' => 'int',
		'locaciones_id' => 'int',
		'activo' => 'int'
	];

	protected $dates = [
		'fecha_inscripcion',
		'prueba_fecha'
	];

	protected $fillable = [
		'atletas_id',
		'fecha_inscripcion',
		'estatus',
		'locaciones_id',
		'prueba_fecha',
		'activo'
	];

	public function atleta()
	{
		return $this->belongsTo(\App\Atleta::class, 'atletas_id');
	}

	public function locacion()
	{
		return $this->belongsTo(\App\Locacion::class, 'locaciones_id');
	}

	public function academia_matriculas()
	{
		return $this->hasMany(\App\AcademiaMatricula::class, 'inscripciones_academia_id');
	}
}
