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
        Schema::create('pelicula_genero', function (Blueprint $table) {
            $table->integer('id_pelicula');
            $table->integer('id_genero')->index('id_genero');

            $table->primary(['id_pelicula', 'id_genero']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelicula_genero');
    }
};
