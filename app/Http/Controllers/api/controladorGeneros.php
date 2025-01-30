<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Genero;

class controladorGeneros extends Controller{
    public function index(){
        $generos = Genero::all()->map(function($genero){
            return [
                'id' => $genero->id,
                'genero' => $genero->nombre,
            ];
        });

        if(!$generos){
            return response()->json(['message' => 'No se encontraron géneros', 'status' => 200], 200);
        }

        $data = [
            'generos' => $generos,
            'status' => 200,
        ];

        return $data;
    }

    public function show($id){
        $genero = Genero::with('peliculas')->find($id);

        if(!$genero){
            return response()->json(['message' => 'Género no encontrado', 'status' => 200], 200);
        }

        $genero = [
            'id' => $genero->id,
            'nombre' => $genero->nombre,
            'peliculas' => $genero->peliculas->pluck('titulo'),
        ];

        $data = [
            'genero' => $genero,
            'status' => 200,
        ];

        return $data;
    }
}