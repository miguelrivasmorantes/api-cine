<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Models\Actore;

class controladorActores extends Controller{
    public function index(Request $request){

        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);
        $ordenNombre = $request->input('orden_nombre');
        $ordenApellido = $request->input('orden_apellido');
        $ordenEdad = $request->input('orden_edad');
        $nombre = $request->input('nombre');
        $edadSuperior = $request->input('edad_superior');
        $edadInferior = $request->input('edad_inferior');
        $nacionalidad = $request->input('nacionalidad');
        

        $actores = Actore::
            when($nombre, function ($q) use ($nombre) {
                $q->whereRaw("CONCAT(nombre, ' ', apellido) LIKE ?", ["%{$nombre}%"]);
            })->
            when($nacionalidad, function ($q) use ($nacionalidad) {$q->where('nacionalidad', 'like', "%{$nacionalidad}%");})->
            when($edadInferior, function ($q) use ($edadInferior) {
                $q->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) >= ?", [$edadInferior]);
            })->
            when($edadSuperior, function ($q) use ($edadSuperior) {
                $q->whereRaw("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) <= ?", [$edadSuperior]);
            })->
            when($ordenNombre, function ($q) use ($ordenNombre){
                $q->orderBy('nombre', $ordenNombre);
            })->
            when($ordenApellido, function ($q) use ($ordenApellido){
                $q->orderBy('apellido', $ordenApellido);
            })->
            when($ordenEdad, function ($q) use ($ordenEdad){
                $q->orderBy('fecha_nacimiento', $ordenEdad);
            })->              
            orderBy('id', 'desc')->
            paginate($perPage, ['*'], 'page', $page)->
            map(function($actor){
            return [
                'id' => $actor->id,
                'nombre' => $actor->nombre,
                'apellido' => $actor->apellido,
                'fecha_nacimiento' => $actor->fecha_nacimiento->format('Y-m-d'),
                'edad' => Carbon::parse($actor->fecha_nacimiento)->age,
                'nacionalidad' => $actor->nacionalidad,
                'foto' => $actor->url_imagen,
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
            'apellido' => $actor->apellido,
            'fecha_nacimiento' => $actor->fecha_nacimiento->format('Y-m-d'),
            'edad' =>  $actor->edad,
            'nacionalidad' => $actor->nacionalidad,
            'foto' => $actor->url_imagen,
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
            'nombre' => 'required|string|max:255',
            'apellido' => ['required|string|max:255',
                            Rule::unique('actores')->where(fn($q) =>
                                $q->where('nombre', $request->nombre)
                            ),
                        ],
            'fecha_nacimiento' => 'required|date_format:Y-m-d',
            'nacionalidad' => 'required|string|max:255',
            'foto' => 'nullable|string',
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
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'nacionalidad' => $request->nacionalidad,
            'url_imagen' => $request->foto,
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
        $actor = Actore::find($id);

        if (!$actor) {
            return response()->json(['message' => 'Actor no encontrado', 'status' => 200]);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'string|max:255|unique:actores,nombre',
            'apellido' => ['required|string|max:255',
                                Rule::unique('actores')->where(fn($q) =>
                                    $q->where('nombre', $request->nombre)
                                ),
                            ],
            'fecha_nacimiento' => 'date_format:Y-m-d',
            'nacionalidad' => 'string|max:255',
            'foto' => 'nullable|string',
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