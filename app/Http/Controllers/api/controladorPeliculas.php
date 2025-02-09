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
	public function index(Request $request){

		$perPage = $request->input('per_page', 10);
		$page = $request->input('page', 1);
		$ordenAlfabetico = $request->input('orden_alfabetico');
		$ordenEstreno = $request->input('orden_estreno');
		$ordenTaquilla = $request->input('orden_taquilla');
		$titulo = $request->input('titulo');
		$tituloInicio = $request->input('titulo_inicio');
		$director = $request->input('director');
		$generos = $request->input('generos', []);
		$actores = $request->input('actores', []);
		$taquillaInferior = $request->input('taquilla_inferior');
		$taquillaSuperior = $request->input('taquilla_superior');
		$estrenoInferior = $request->input('estreno_inferior');
		$estrenoSuperior = $request->input('estreno_superior');
		$estreno = $request->input('estreno');
		$estudio = $request->input('estudio');
		$pais = $request->input('pais');

		$peliculas = Pelicula::
			with('estudio', 'director', 'generos', 'actores', 'posters')->
			when($titulo, function ($q) use ($titulo) {
				$q->where('titulo', 'like', "%{$titulo}%")
				  ->orderByRaw("titulo LIKE ? DESC", ["{$titulo}%"]);
			})->
			when($tituloInicio, function ($q) use ($tituloInicio) {$q->where('titulo', 'like', "{$tituloInicio}%");})->
			when($director, fn($q) => 
				$q->whereHas('director', fn($q) => 
					$q->whereRaw("CONCAT(nombre, ' ', apellido) LIKE ?", ["%{$director}%"])
				)
			)->
			when($estudio, fn($q) => $q->whereHas('estudio', fn($q) => $q->where('nombre', 'like', "%{$estudio}%")))->
			when($generos, function ($q) use ($generos) {
				foreach ((array) $generos as $genero) {
					$q->whereHas('generos', function ($q) use ($genero) {
						$q->where('nombre', 'like', "%{$genero}%");
					});
				}
			})->
			when($actores, function ($q) use ($actores) {
				foreach ((array) $actores as $actor) {
					$q->whereHas('actores', fn($q) => 
						$q->whereRaw("CONCAT(nombre, ' ', apellido) LIKE ?", ["%{$actor}%"])
					);
				}
			})->
			when($taquillaInferior, function ($q) use ($taquillaInferior) {
				$q->where('taquilla', '>=', $taquillaInferior);
			})->
			when($taquillaSuperior, function ($q) use ($taquillaSuperior) {
				$q->where('taquilla', '<=', $taquillaSuperior);
			})->
			when($estrenoInferior, function ($q) use ($estrenoInferior) {
				$q->where('estreno', '>=', $estrenoInferior);
			})->
			when($estrenoSuperior, function ($q) use ($estrenoSuperior) {
				$q->where('estreno', '<=', $estrenoSuperior);
			})->
			when($pais, function ($q) use ($pais) {$q->where('pais', 'like', "%{$pais}%");})->
			when($ordenAlfabetico, function ($q) use ($ordenAlfabetico){
				$q->orderBy('titulo', $ordenAlfabetico);
			})->
			when($ordenEstreno, function ($q) use ($ordenEstreno){
				$q->orderBy('estreno', $ordenEstreno);
			})->
			when($ordenTaquilla, function ($q) use ($ordenTaquilla){
				$q->orderBy('taquilla', $ordenTaquilla);
			})->
			orderBy('id', 'desc')->
			paginate($perPage, ['*'], 'page', $page)->
			map(function ($pelicula) {
				return [
					'id' => $pelicula->id,
					'titulo' => $pelicula->titulo,
					'estreno' => $pelicula->estreno->format('Y-m-d'),
					'taquilla' => $pelicula->taquilla,
					'pais' => $pelicula->pais,
					'estudio' => $pelicula->estudio->nombre,
					'director' => "{$pelicula->director->nombre} {$pelicula->director->apellido}",
					'generos' => $pelicula->generos->pluck('nombre'),
					'actores' => $pelicula->actores->map(fn($actor) => "{$actor->nombre} {$actor->apellido}"),
					'posters' => $pelicula->posters->pluck('url'),
					'sinopsis' => $pelicula->sinopsis,
				];
		});

		if (!$peliculas) {
			return response()->json(['message' => 'No se encontraron peliculas', 'status' => 200]);
		}

		if ($peliculas->isEmpty()) {
			return response()->json(['message' => 'No se ha encontrado una pelicula con la información proporcionada', 'status' => 200]);
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
			'director' => "{$pelicula->director->nombre} {$pelicula->director->apellido}",
			'generos' => $pelicula->generos->pluck('nombre'),
			'actores' => $pelicula->actores->map(fn($actor) => "{$actor->nombre} {$actor->apellido}"),
			'posters' => $pelicula->posters->pluck('url'),
			'sinopsis' => $pelicula->sinopsis,
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
			'director' => 'required|array',
			'director.nombre' => 'required|string|max:255|exists:directores,nombre',
			'director.apellido' => 'required|string|max:255|exists:directores,apellido',
			'generos' => 'required|array',
			'generos.*' => 'required|string|max:255|exists:generos,nombre',
			'actores' => 'required|array',
			'actores.*.nombre' => 'required|string|max:255|exists:actores,nombre',
			'actores.*.apellido' => 'required|string|max:255|exists:actores,apellido',
			'posters' => 'required|array',
			'posters.*' => 'required|string|url',
			'sinopsis' => 'required|string|max:900',
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
			'sinopsis' => $request->sinopsis,
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
			'director' => 'array',
			'director.nombre' => 'string|max:255|exists:directores,nombre',
			'director.apellido' => 'string|max:255|exists:directores,apellido',			
			'generos' => 'array',
			'generos.*' => 'string|max:255|exists:generos,nombre',
			'actores' => 'array',
			'actores.*.nombre' => 'string|max:255|exists:actores,nombre',
			'actores.*.apellido' => 'string|max:255|exists:actores,apellido',
			'posters' => 'array',
			'posters.*' => 'string|url',
			'sinopsis' => 'string|max:900'
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

	public function filtersData()
    {
        $paises = Pelicula::distinct()->pluck('pais');
		$estudios = Estudio::distinct()->pluck('nombre');
    
        $estrenoInferior = Pelicula::min('estreno');
		$estrenoSuperior = Pelicula::max('estreno');

		$taquillaInferior = Pelicula::min('taquilla');
		$taquillaSuperior = Pelicula::max('taquilla');

		$actores = Actore::selectRaw("CONCAT(nombre, ' ', apellido) as nombre_completo")->pluck('nombre_completo');

		$directores = Directore::selectRaw("CONCAT(nombre, ' ', apellido) as nombre_completo")->pluck('nombre_completo');

		$generos = Genero::pluck('nombre');
    
        $filtersData = [
            'paises' => $paises,
            'estudios' => $estudios,
            'estreno_inferior' => $estrenoInferior,
            'estreno_superior' => $estrenoSuperior,
			'taquilla_inferior' => $taquillaInferior,
            'taquilla_superior' => $taquillaSuperior,
			'actores' => $actores,
			'directores' => $directores,
			'generos' => $generos,
        ];
    
        if (!$filtersData) {
            return response()->json(['message' => 'No se encontraron filtros', 'status' => 200]);
        }

        $data = [
            'filters_data' => $filtersData,
            'status' => 200
        ];
    
        return $data;
    }
}