<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Directore;

class controladorDirectores extends Controller{
    public function index(){
        $directores = Directore::all()->map(function($director){
            return [
                'id' => $director->id,
                'nombre' => $director->nombre,
                'fecha_nacimiento' => $director->fecha_nacimiento->format('Y-m-d'),
                'nacionalidad' => $director->nacionalidad,
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
}