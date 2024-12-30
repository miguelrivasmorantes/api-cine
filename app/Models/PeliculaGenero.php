<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PeliculaGenero
 * 
 * @property int $id_pelicula
 * @property int $id_genero
 * 
 * @property Pelicula $pelicula
 * @property Genero $genero
 *
 * @package App\Models
 */
class PeliculaGenero extends Model
{
	protected $table = 'pelicula_genero';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_pelicula' => 'int',
		'id_genero' => 'int'
	];

	public function pelicula()
	{
		return $this->belongsTo(Pelicula::class, 'id_pelicula');
	}

	public function genero()
	{
		return $this->belongsTo(Genero::class, 'id_genero');
	}
}
