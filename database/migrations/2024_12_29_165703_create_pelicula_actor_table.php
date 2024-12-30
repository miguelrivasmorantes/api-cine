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
        Schema::create('pelicula_actor', function (Blueprint $table) {
            $table->integer('id_pelicula');
            $table->integer('id_actor')->index('id_actor');

            $table->primary(['id_pelicula', 'id_actor']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelicula_actor');
    }
};
