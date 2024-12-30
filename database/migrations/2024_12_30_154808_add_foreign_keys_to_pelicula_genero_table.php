<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pelicula_genero', function (Blueprint $table) {
            $table->foreign(['id_pelicula'], 'pelicula_genero_ibfk_1')->references(['id'])->on('peliculas')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_genero'], 'pelicula_genero_ibfk_2')->references(['id'])->on('generos')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pelicula_genero', function (Blueprint $table) {
            $table->dropForeign('pelicula_genero_ibfk_1');
            $table->dropForeign('pelicula_genero_ibfk_2');
        });
    }
};
