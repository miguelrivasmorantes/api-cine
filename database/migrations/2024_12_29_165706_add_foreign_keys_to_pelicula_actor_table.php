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
        Schema::table('pelicula_actor', function (Blueprint $table) {
            $table->foreign(['id_pelicula'], 'pelicula_actor_ibfk_1')->references(['id'])->on('peliculas')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_actor'], 'pelicula_actor_ibfk_2')->references(['id'])->on('actores')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pelicula_actor', function (Blueprint $table) {
            $table->dropForeign('pelicula_actor_ibfk_1');
            $table->dropForeign('pelicula_actor_ibfk_2');
        });
    }
};
