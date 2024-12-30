<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pelicula;

class controladorPeliculas extends Controller
{
    public function index(){
        $peliculas = Pelicula::with('estudio', 'directore', 'generos', 'actores')->get()->map(function($pelicula) {
            return [
                'id' => $pelicula->id,
                'titulo' => $pelicula->titulo,
                'estreno' => $pelicula->estreno,
                'taquilla' => $pelicula->taquilla,
                'pais' => $pelicula->pais,
                'estudio' => $pelicula->estudio->nombre,
                'director' => $pelicula->directore ->nombre,
                'generos' => $pelicula->generos->pluck('nombre'),
                'actores' => $pelicula->actores->pluck('nombre'),
            ];
        });

        if (!$peliculas) {
            return response()->json(['message' => 'No se encontraron peliculas', 'status' => 200], 200);
        }

        $data = [
            'peliculas' => $peliculas,
            'status' => 200,
        ];
    
        return response()->json($data, 200);
    }    

    public function show($id){
        $pelicula = Pelicula::with('estudio', 'directore', 'generos', 'actores')->find($id);

        if (!$pelicula) {
            return response()->json(['message' => 'Película no encontrada', 'status' => 200], 200);
        }

        $pelicula = [
            'id' => $pelicula->id,
            'titulo' => $pelicula->titulo,
            'estreno' => $pelicula->estreno,
            'taquilla' => $pelicula->taquilla,
            'pais' => $pelicula->pais,
            'estudio' => $pelicula->estudio->nombre,
            'director' => $pelicula->directore->nombre,
            'generos' => $pelicula->generos->pluck('nombre'),
            'actores' => $pelicula->actores->pluck('nombre'),
        ];

        $data = [
            'pelicula' => $pelicula,
            'status' => 200,
        ];

        return response()->json($data, 200);
    }
}
