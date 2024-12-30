<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PeliculaActor
 * 
 * @property int $id_pelicula
 * @property int $id_actor
 * 
 * @property Pelicula $pelicula
 * @property Actore $actore
 *
 * @package App\Models
 */
class PeliculaActor extends Model
{
	protected $table = 'pelicula_actor';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_pelicula' => 'int',
		'id_actor' => 'int'
	];

	public function pelicula()
	{
		return $this->belongsTo(Pelicula::class, 'id_pelicula');
	}

	public function actore()
	{
		return $this->belongsTo(Actore::class, 'id_actor');
	}
}
