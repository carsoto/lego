<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Mar 2019 16:02:26 +0000.
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
 * @property int $locaciones_id
 * @property int $uniformes
 * @property int $activo
 * @property \Carbon\Carbon $prueba_fecha
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Atleta $atleta
 * @property \App\Locacione $locacione
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
		'uniformes' => 'int',
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
		'uniformes',
		'activo',
		'prueba_fecha'
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
