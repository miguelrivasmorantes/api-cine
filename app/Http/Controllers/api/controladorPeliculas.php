<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pelicula;
use App\Models\Directore;
use App\Models\Estudio;
use App\Models\Genero;
use App\Models\Actore;
use App\Models\Poster;

class controladorPeliculas extends Controller
{
    public function index(){
        $peliculas = Pelicula::with('estudio', 'director', 'generos', 'actores', 'posters')->get()->map(function($pelicula) {
            return [
                'id' => $pelicula->id,
                'titulo' => $pelicula->titulo,
                'estreno' => $pelicula->estreno->format('Y-m-d'),
                'taquilla' => $pelicula->taquilla,
                'pais' => $pelicula->pais,
                'estudio' => $pelicula->estudio->nombre,
                'director' => $pelicula->director->nombre,
                'generos' => $pelicula->generos->pluck('nombre'),
                'actores' => $pelicula->actores->pluck('nombre'),
                'posters' => $pelicula->posters->pluck('url'),
            ];
        });

        if (!$peliculas) {
            return response()->json(['message' => 'No se encontraron peliculas', 'status' => 200]);
        }

        $data = [
            'peliculas' => $peliculas,
            'status' => 200,
        ];
    
        return $data;
    }    

    public function show($id){
        $pelicula = Pelicula::with('estudio', 'director', 'generos', 'actores', 'posters')->find($id);

        if (!$pelicula) {
            return response()->json(['message' => 'Película no encontrada', 'status' => 200]);
        }

        $pelicula = [
            'id' => $pelicula->id,
            'titulo' => $pelicula->titulo,
            'estreno' => $pelicula->estreno->format('Y-m-d'),
            'taquilla' => $pelicula->taquilla,
            'pais' => $pelicula->pais,
            'estudio' => $pelicula->estudio->nombre,
            'director' => $pelicula->director->nombre,
            'generos' => $pelicula->generos->pluck('nombre'),
            'actores' => $pelicula->actores->pluck('nombre'),
            'posters' => $pelicula->posters->pluck('url'),
        ];

        $data = [
            'pelicula' => $pelicula,
            'status' => 200,
        ];

        return $data;
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255|unique:peliculas,titulo',
            'estreno' => 'required|date_format:Y-m-d',
            'taquilla' => 'sometimes|numeric',
            'pais' => 'required|string|max:255',
            'estudio' => 'required|string|max:255|exists:estudios,nombre',
            'director' => 'required|string|max:255|exists:directores,nombre',
            'generos' => 'required|array',
            'generos.*' => 'required|string|max:255|exists:generos,nombre',
            'actores' => 'required|array',
            'actores.*' => 'required|string|max:255|exists:actores,nombre',
            'posters' => 'required|array',
            'posters.*' => 'required|string|url',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400,
            ];

            return $data;
        }

        $director = Directore::where('nombre', $request->director)->first();
        $estudio = Estudio::where('nombre', $request->estudio)->first();

        $pelicula = Pelicula::create([
            'titulo' => $request->titulo,
            'estreno' => $request->estreno,
            'taquilla' => $request->taquilla,
            'pais' => $request->pais,
            'id_estudio' => $estudio->id,
            'id_director' => $director->id,
            'actores' => $request->actores,
        ]);

        $generoId = Genero::whereIn('nombre', $request->generos)->pluck('id');
        $pelicula->generos()->attach($generoId);
        
        $actorId = Actore::whereIn('nombre', $request->actores)->pluck('id');
        $pelicula->actores()->attach($actorId);

        $posters = array_map(function ($url) use ($pelicula) {
            return ['id_pelicula' => $pelicula->id, 'url' => $url];
        }, $request->posters);

        Poster::insert($posters);

        if(!$pelicula){
            $data = [
                'message' => 'Error al crear la película',
                'status' => 500,
            ];

            return $data;
        }

        $data = [
            'pelicula' => $pelicula,
            'status' => 201
        ];

        return $data;
    }

    public function update(Request $request, $id){
        $pelicula = Pelicula::find($id);

        if (!$pelicula) {
            return response()->json(['message' => 'Película no encontrada', 'status' => 200]);
        }

        $validator = Validator::make($request->all(), [
            'titulo' => 'string|max:255|unique:peliculas,titulo',
            'estreno' => 'date_format:Y-m-d',
            'taquilla' => 'numeric',
            'pais' => 'string|max:255',
            'estudio' => 'string|max:255|exists:estudios,nombre',
            'director' => 'string|max:255|exists:directores,nombre',
            'generos' => 'array',
            'generos.*' => 'string|max:255|exists:generos,nombre',
            'actores' => 'array',
            'actores.*' => 'string|max:255|exists:actores,nombre',
            'posters' => 'array',
            'posters.*' => 'string|url',
        ]);

        if($validator->fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400,
            ];

            return $data;
        }

        if ($request->has('director')) {
            $pelicula['id_director'] = Directore::where('nombre', $request->director)->value('id');
        }
        if ($request->has('estudio')) {
            $pelicula['id_estudio'] = Estudio::where('nombre', $request->estudio)->value('id');
        }

        $pelicula->fill($request->all());

        if(!$pelicula){
            $data = [
                'message' => 'Error al actualizar la pelicula',
                'status' => 500,
            ];

            return $data;
        }

        $pelicula->save();

        if ($request->has('generos')) {
            $generoId = Genero::whereIn('nombre', $request->generos)->pluck('id')->toArray();
            $pelicula->generos()->sync($generoId);
        }

        if ($request->has('actores')) {
            $actorId = Actore::whereIn('nombre', $request->actores)->pluck('id')->toArray();
            $pelicula->actores()->sync($actorId);
        }

        if ($request->has('posters')) {
            Poster::where('id_pelicula', $pelicula->id)->delete();
            $posters = array_map(function ($url) use ($pelicula) {
                return ['id_pelicula' => $pelicula->id, 'url' => $url];
            }, $request->posters);

            Poster::insert($posters);
        }

        $data = [
          'pelicula' => $pelicula,
          'status' => 202,  
        ];

        return $data;
    }

    public function destroy($id){
        $pelicula = Pelicula::find($id);

        if (!$pelicula) {
            return response()->json(['message' => 'Película no encontrada', 'status' => 200]);
        }

        $pelicula->actores()->detach();
        $pelicula->generos()->detach();
        $pelicula->posters()->delete();

        $pelicula->delete();

        $data = [
            'message' => 'Pelicula eliminada',
            'status' => 200,
        ];

        return $data;
    }

    public function search(Request $request){
        $query = $request->input('query');

        $peliculas = Pelicula::where('titulo', 'like', "%{$query}%")->get()->map(function($pelicula) {
            return [
                'id' => $pelicula->id,
                'titulo' => $pelicula->titulo,
                'estreno' => $pelicula->estreno->format('Y-m-d'),
                'taquilla' => $pelicula->taquilla,
                'pais' => $pelicula->pais,
                'estudio' => $pelicula->estudio->nombre,
                'director' => $pelicula->director->nombre,
                'generos' => $pelicula->generos->pluck('nombre'),
                'actores' => $pelicula->actores->pluck('nombre'),
                'posters' => $pelicula->posters->pluck('url'),
            ];
        });

        if ($peliculas->isEmpty()) {
            return response()->json(['message' => 'No se ha encontrado una pelicula con la información proporcionada', 'status' => 200]);
        }

        $data = [
            'pelicula' => $peliculas,
            'status' => 200,
        ];

        return $data;
    }
}