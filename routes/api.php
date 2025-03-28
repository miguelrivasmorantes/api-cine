<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\controladorPeliculas;
use App\Http\Controllers\api\controladorEstudios;
use App\Http\Controllers\api\controladorGeneros;
use App\Http\Controllers\api\controladorDirectores;
use App\Http\Controllers\api\controladorActores;

Route::get('/hola', function () {
    return 'Hola Mundo!!!';
});

// Start: Operations for Películas
Route::get('/peliculas', [controladorPeliculas::class, 'index']);

Route::get('/peliculas/{id}', [controladorPeliculas::class, 'show']);

Route::post('/peliculas', [controladorPeliculas::class, 'store']);

Route::patch('/peliculas/{id}', [controladorPeliculas::class, 'update']);

Route::delete('/peliculas/{id}', [controladorPeliculas::class, 'destroy']);
// End: Operations for Películas


// Start: Operations for Estudios
Route::get('/estudios', [controladorEstudios::class, 'index']);

Route::get('/estudios/{id}', [controladorEstudios::class, 'show']);

Route::post('/estudios', [controladorEstudios::class, 'store']);

Route::patch('/estudios/{id}', [controladorEstudios::class, 'update']);
// End: Operations for Estudios


// Start: Operatios for Géneros
Route::get('/generos', [controladorGeneros::class, 'index']);

Route::get('/generos/{id}', [controladorGeneros::class, 'show']);

Route::post('/generos', [controladorGeneros::class, 'store']);
// End: Operatios for Géneros


// Start: Operatios for Directores
Route::get('/directores', [controladorDirectores::class, 'index']);

Route::get('/directores/{id}', [controladorDirectores::class, 'show']);

Route::post('/directores', [controladorDirectores::class, 'store']);

Route::patch('/directores/{id}', [controladorDirectores::class, 'update']);
// End: Operatios for Directores

// Start: Operatios for Actores
Route::get('/actores', [controladorActores::class, 'index']);

Route::get('/actores/{id}', [controladorActores::class, 'show']);

Route::post('/actores', [controladorActores::class, 'store']);

Route::patch('/actores/{id}', [controladorActores::class, 'update']);
// End: Operatios for Actores