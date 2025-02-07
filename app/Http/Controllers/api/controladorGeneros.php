<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Genero;

class controladorGeneros extends Controller{
    public function index(Request $request){

        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);
        $ordenAlfabetico = $request->input('orden_alfabetico');
        $nombre = $request->input('nombre');

        $generos = Genero::
            when($nombre, function ($q) use ($nombre) {$q->where('nombre', 'like', "%{$nombre}%");})->
            when($ordenAlfabetico, function ($q) use ($ordenAlfabetico){
                $q->orderBy('nombre', $ordenAlfabetico);
            })->
            orderBy('id', 'desc')->
            paginate($perPage, ['*'], 'page', $page)->
            map(function($genero){
                return [
                    'id' => $genero->id,
                    'genero' => $genero->nombre,
                    'imagen' => $genero->img,
                ];
        });

        if(!$generos){
            return response()->json(['message' => 'No se encontraron géneros', 'status' => 200]);
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
            return response()->json(['message' => 'Género no encontrado', 'status' => 200]);
        }

        $genero = [
            'id' => $genero->id,
            'nombre' => $genero->nombre,
            'imagen' => $genero->img,
            'peliculas' => $genero->peliculas->pluck('titulo'),
        ];

        $data = [
            'genero' => $genero,
            'status' => 200,
        ];

        return $data;
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'genero' => 'required|string|max:255|unique:generos,nombre',
            'imagen' => 'nullable|string|max:255',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400,
            ];

            return $data;
        }

        $genero = Genero::create([
            'nombre' => $request->genero,
            'imagen' => $request->img,
        ]);

        $data = [
            'genero' => $genero,
            'status' => 201,
        ];

        return $data;
    }
}