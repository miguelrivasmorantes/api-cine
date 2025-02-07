<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Estudio;

class controladorEstudios extends Controller{
    public function index(Request $request){

        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);
        $ordenAlfabetico = $request->input('orden_alfabetico');
        $ordenAntiguedad = $request->input('orden_antiguedad');
        $nombre = $request->input('nombre');
        $AntiguedadSuperior = $request->input('antiguedad_superior');
        $AntiguedadInferior = $request->input('antiguedad_inferior');
        $pais = $request->input('pais');

        $estudios = Estudio::
            when($nombre, function ($q) use ($nombre) {$q->where('nombre', 'like', "%{$nombre}%");})->
            when($pais, function ($q) use ($pais) {$q->where('pais', 'like', "%{$pais}%");})->               
            when($AntiguedadInferior, function ($q) use ($AntiguedadInferior) {
                $q->whereRaw("TIMESTAMPDIFF(YEAR, fundacion, CURDATE()) >= ?", [$AntiguedadInferior]);
            })->
            when($AntiguedadSuperior, function ($q) use ($AntiguedadSuperior) {
                $q->whereRaw("TIMESTAMPDIFF(YEAR, fundacion, CURDATE()) <= ?", [$AntiguedadSuperior]);
            })->
            when($ordenAlfabetico, function ($q) use ($ordenAlfabetico){
                $q->orderBy('nombre', $ordenAlfabetico);
            })->
            when($ordenAntiguedad, function ($q) use ($ordenAntiguedad){
                $q->orderBy('fundacion', $ordenAntiguedad);
            })->
            orderBy('id', 'desc')->
            paginate($perPage, ['*'], 'page', $page)->
            map(function($estudio){
                return [
                    'id' => $estudio->id,
                    'nombre' => $estudio->nombre,
                    'pais' => $estudio->pais,
                    'fundacion' => $estudio->fundacion->format('Y-m-d'),
                    'logo' => $estudio->url_logo,
                ];
        });

        if(!$estudios){
            return response()->json(['message' => 'No se encontraron estudios', 'status' => 200]);
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
            return response()->json(['message' => 'Estudio no encontrado', 'status' => 200]);
        }

        $estudio = [
            'id' => $estudio->id,
            'nombre' => $estudio->nombre,
            'pais' => $estudio->pais,
            'fundacion' => $estudio->fundacion->format('Y-m-d'),
            'logo' => $estudio->url_logo,
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
            'logo' => 'nullable|string',
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
            'url_logo' => $request->logo,
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

        return $data;
    }

    public function update(Request $request, $id){
        $estudio = Estudio::find($id);

        if (!$estudio) {
            return response()->json(['message' => 'Estudio no encontrado', 'status' => 200]);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'string|max:255|unique:estudios,nombre',
            'pais' => 'string|max:255',
            'fundacion' => 'date_format:Y-m-d',
            'logo' => 'nullable|string',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400,
            ];

            return $data;
        }

        $estudio->fill($request->all());

        if(!$estudio){
            $data = [
                'message' => 'Error al actualizar el estudio',
                'status' => 500,
            ];

            return $data;
        }

        $estudio->save();

        $data = [
          'estudio' => $estudio,
          'status' => 202,  
        ];

        return $data;
    }
}