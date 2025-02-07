<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    protected $table = 'posters';
    public $timestamps = false;

    protected $fillable = [
        'id_pelicula',
        'url'
    ];

    public function pelicula()
    {
        return $this->belongsTo(Pelicula::class, 'id_pelicula');
    }
}
