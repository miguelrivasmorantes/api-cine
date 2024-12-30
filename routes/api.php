<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\controladorPeliculas;

Route::get('/hola', function () {
    return 'Hola Mundo!!!';
});

Route::get('/peliculas', [controladorPeliculas::class, 'index']);