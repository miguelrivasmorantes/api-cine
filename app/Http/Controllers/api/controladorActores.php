<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Actore;

class controladorActores extends Controller{
    public function index(){
        $actores = Actore::all()->map(function($actor){
            return [
                'id' => $actor->id,
                'nombre' => $actor->nombre,
                'fecha_nacimiento' => $actor->fecha_nacimiento->format('Y-m-d'),
                'nacionalidad' => $actor->nacionalidad,
            ];
        });

        if(!$actores){
            return response()->json(['message' => 'No se encontraron actores', 'status' => 200]);
        }

        $data = [
            'actores' => $actores,
            'status' => 200,
        ];

        return $data;
    }

    public function show($id){
        $actor = Actore::with('peliculas')->find($id);

        if(!$actor){
            return response()->json(['message' => 'Actor no encontrado', 'status' => 200]);
        }

        $actor = [
            'id' => $actor->id,
            'nombre' => $actor->nombre,
            'fecha_nacimiento' => $actor->fecha_nacimiento->format('Y-m-d'),
            'nacionalidad' => $actor->nacionalidad,
            'peliculas' => $actor->peliculas->pluck('titulo'),
        ];

        $data = [
            'actor' => $actor,
            'status' => 200,
        ];

        return $data;
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:actores,nombre',
            'fecha_nacimiento' => 'required|date_format:Y-m-d',
            'nacionalidad' => 'required|string|max:255',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400,
            ];

            return $data;
        }
        
        $actor = Actore::create([
            'nombre' => $request->nombre,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'nacionalidad' => $request->nacionalidad,
        ]);
        
        if(!$actor){
            $data = [
                'message' => 'Error al crear el actor',
                'status' => 500,
            ];

            return $data;
        }

        $data = [
            'actor' => $actor,
            'status' => 201
        ];

        return $data;
    }

    public function update(Request $request, $id){
        $actor = Actore::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nombre' => 'string|max:255|unique:actores,nombre',
            'fecha_nacimiento' => 'date_format:Y-m-d',
            'nacionalidad' => 'string|max:255',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400,
            ];

            return $data;
        }

        $actor->fill($request->all());

        if(!$actor){
            $data = [
                'message' => 'Error al actualizar el actor',
                'status' => 500,
            ];

            return $data;
        }

        $actor->save();

        $data = [
          'actor' => $actor,
          'status' => 202,  
        ];

        return $data;
    }
}