<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelicula;

class controladorPeliculas extends Controller
{
    public function index(){
        $peliculas = Pelicula::with('estudio', 'directore')->get()->map(function($pelicula) {
            return [
                'id' => $pelicula->id,
                'titulo' => $pelicula->titulo,
                'estreno' => $pelicula->estreno,
                'taquilla' => $pelicula->taquilla,
                'pais' => $pelicula->pais,
                'estudio' => $pelicula->estudio->nombre,
                'director' => $pelicula->directore ->nombre,
            ];
        });

        $data = [
            'peliculas' => $peliculas,
            'status' => 200,
        ];
    
        return response()->json($data, 200);
    }    

    public function show($id){
        $pelicula = Pelicula::with('estudio', 'directore')->find($id);

        $pelicula = [
            'id' => $pelicula->id,
            'titulo' => $pelicula->titulo,
            'estreno' => $pelicula->estreno,
            'taquilla' => $pelicula->taquilla,
            'pais' => $pelicula->pais,
            'estudio' => $pelicula->estudio->nombre,
            'director' => $pelicula->directore->nombre,
        ];

        $data = [
            'pelicula' => $pelicula,
            'status' => 200,
        ];

        return response()->json($data, 200);
    }
}
