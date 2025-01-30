<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\controladorPeliculas;
use App\Http\Controllers\api\controladorEstudios;

Route::get('/hola', function () {
    return 'Hola Mundo!!!';
});

// Start: CRUD operations for Películas
Route::get('/peliculas', [controladorPeliculas::class, 'index']);

Route::get('/peliculas/{id}', [controladorPeliculas::class, 'show']);

Route::post('/peliculas', [controladorPeliculas::class, 'store']);
// Start: CRUD operations for Películas


// Start: CRUD operations for Estudios
Route::get('/estudios', [controladorEstudios::class, 'index']);

Route::get('/estudios/{id}', [controladorEstudios::class, 'show']);

Route::post('/estudios', [controladorEstudios::class, 'store']);

Route::delete('/estudios/{id}', [controladorEstudios::class, 'destroy']);

Route::patch('/estudios/{id}', [controladorEstudios::class, 'update']);
// End: CRUD operations for Estudios
