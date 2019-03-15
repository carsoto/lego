<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 14 Mar 2019 16:02:26 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AtletasUniforme
 * 
 * @property int $id
 * @property int $atletas_id
 * @property int $uniformes_id
 * @property int $tallas_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Atleta $atleta
 * @property \App\Talla $talla
 * @property \App\Uniforme $uniforme
 *
 * @package App
 */
class AtletasUniforme extends Eloquent
{
	protected $casts = [
		'atletas_id' => 'int',
		'uniformes_id' => 'int',
		'tallas_id' => 'int'
	];

	protected $fillable = [
		'atletas_id',
		'uniformes_id',
		'tallas_id'
	];

	public function atleta()
	{
		return $this->belongsTo(\App\Atleta::class, 'atletas_id');
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
