<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pelicula;

class controladorPeliculas extends Controller
{
    public function index(){
        $peliculas = Pelicula::all();

        if($peliculas->isEmpty()){
            $data = [
                'message' => 'No se encontraron peliculas',
                'status' => 200
            ];

            return response()->json($data, 404);
        }

        return response()->json($peliculas, 200);
    }
}
