<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Estudio;

class controladorEstudios extends Controller{
    public function index(){
        $estudios = Estudio::with('peliculas')->get()->map(function($estudio) {
            return [
                'id' => $estudio->id,
                'nombre' => $estudio->nombre,
                'pais' => $estudio->pais,
                'fundacion' => $estudio->fundacion->format('Y-m-d'),
                'peliculas' => $estudio->peliculas->pluck('titulo'),
            ];
        });

        if(!$estudios){
            return response()->json(['message' => 'No se encontraron estudios', 'status' => 200], 200);
        }

        $data = [
            'estudios' => $estudios,
            'status' => 200,
        ];

        return $data;
    }

    public function show($id){
        $estudio = Estudio::with('peliculas')->find($id);

        if(!$estudio){
            return response()->json(['message' => 'Estudio no encontrado', 'status' => 200], 200);
        }

        $estudio = [
            'id' => $estudio->id,
            'nombre' => $estudio->nombre,
            'pais' => $estudio->pais,
            'fundacion' => $estudio->fundacion->format('Y-m-d'),
            'peliculas' => $estudio->peliculas->pluck('titulo'),
        ];

        $data = [
            'estudio' => $estudio,
            'status' => 200,
        ];

        return $data;
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:estudios,nombre',
            'pais' => 'required|string|max:255',
            'fundacion' => 'required|date_format:Y-m-d',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400,
            ];

            return $data;
        }

        $estudio = Estudio::create([
            'nombre' => $request->nombre,
            'pais' => $request->pais,
            'fundacion' => $request->fundacion,
        ]);

        if(!$estudio){
            $data = [
                'message' => 'Error al crear el estudio',
                'status' => 500,
            ];

            return $data;
        }

        $data = [
            'estudio' => $estudio,
            'status' => 201,
        ];

        return response()->json($data, 201);
    }
}