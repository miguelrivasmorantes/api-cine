<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estudio
 * 
 * @property int $id
 * @property string $nombre
 * @property string|null $pais
 * @property Carbon|null $fundacion
 * 
 * @property Collection|Pelicula[] $peliculas
 *
 * @package App\Models
 */
class Estudio extends Model
{
	protected $table = 'estudios';
	public $timestamps = false;

	protected $casts = [
		'fundacion' => 'datetime'
	];

	protected $fillable = [
		'nombre',
		'pais',
		'fundacion',
		'url_logo',
	];

	public function peliculas()
	{
		return $this->hasMany(Pelicula::class, 'id_estudio');
	}
}
