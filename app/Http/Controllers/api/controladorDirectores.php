<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use App\Models\Directore;

class controladorDirectores extends Controller{
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
        $peliculas = $request->input('peliculas', []);
        

        $directores = Directore::
            when($nombre, function ($q) use ($nombre) {
                $q->whereRaw("CONCAT(nombre, ' ', apellido) LIKE ?", ["%{$nombre}%"]);
            })->
            when($nacionalidad, function ($q) use ($nacionalidad) {$q->where('nacionalidad', 'like', "%{$nacionalidad}%");})->
            when($peliculas, function ($q) use ($peliculas) {
                foreach ((array) $peliculas as $pelicula) {
                    $q->whereHas('peliculas', fn($q) => 
                        $q->where('titulo', 'LIKE', "%{$pelicula}%")
                    );
                }
            })->                   
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
            map(function($director){
                return [
                    'id' => $director->id,
                    'nombre' => "{$director->nombre} {$director->apellido}",
                    'fecha_nacimiento' => $director->fecha_nacimiento->format('Y-m-d'),
                    'edad' => Carbon::parse($director->fecha_nacimiento)->age,
                    'nacionalidad' => $director->nacionalidad,
                    'foto' => $director->url_imagen,
                ];
        });

        if(!$directores){
            return response()->json(['message' => 'No se encontraron directores', 'status' => 200]);
        }

        $data = [
            'directores' => $directores,
            'status' => 200,
        ];

        return $data;
    }

    public function show($id){
        $director = Directore::with('peliculas')->find($id);

        if(!$director){
            return response()->json(['message' => 'Director no encontrado', 'status' => 200]);
        }

        $director = [
            'id' => $director->id,
            'nombre' => "{$director->nombre} {$director->apellido}",
            'fecha_nacimiento' => $director->fecha_nacimiento->format('Y-m-d'),
            'nacionalidad' => $director->nacionalidad,
            'foto' => $director->url_imagen,
            'peliculas' => $director->peliculas->pluck('titulo'),
        ];

        $data = [
            'director' => $director,
            'status' => 200,
        ];

        return $data;
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellido' => ['required|string|max:255',
                            Rule::unique('directores')->where(fn($q) =>
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
        
        $director = Directore::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'nacionalidad' => $request->nacionalidad,
            'url_imagen' => $request->foto,
        ]);
        
        if(!$director){
            $data = [
                'message' => 'Error al crear el director',
                'status' => 500,
            ];

            return $data;
        }

        $data = [
            'director' => $director,
            'status' => 201
        ];

        return $data;
    }

    public function update(Request $request, $id){
        $director = Directore::find($id);

        if (!$director) {
            return response()->json(['message' => 'Director no encontrado', 'status' => 200]);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'string|max:255',
            'apellido' => ['required|string|max:255',
                                Rule::unique('directores')->where(fn($q) =>
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

        $director->fill($request->all());

        if(!$director){
            $data = [
                'message' => 'Error al actualizar el director',
                'status' => 500,
            ];

            return $data;
        }

        $director->save();

        $data = [
          'director' => $director,
          'status' => 202,  
        ];

        return $data;
    }
}