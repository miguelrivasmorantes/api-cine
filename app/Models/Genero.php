<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Genero
 * 
 * @property int $id
 * @property string $nombre
 * 
 * @property Collection|Pelicula[] $peliculas
 *
 * @package App\Models
 */
class Genero extends Model
{
	protected $table = 'generos';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];

	public function peliculas()
	{
		return $this->belongsToMany(Pelicula::class, 'pelicula_genero', 'id_genero', 'id_pelicula');
	}
}
