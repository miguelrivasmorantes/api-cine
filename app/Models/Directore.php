<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Directore
 * 
 * @property int $id
 * @property string $nombre
 * @property Carbon|null $fecha_nacimiento
 * @property string|null $nacionalidad
 * 
 * @property Collection|Pelicula[] $peliculas
 *
 * @package App\Models
 */
class Directore extends Model
{
	protected $table = 'directores';
	public $timestamps = false;

	protected $casts = [
		'fecha_nacimiento' => 'datetime'
	];

	protected $fillable = [
		'nombre',
		'apellido',
		'fecha_nacimiento',
		'nacionalidad',
		'url_imagen',
	];

	public function peliculas()
	{
		return $this->hasMany(Pelicula::class, 'id_director');
	}
}
