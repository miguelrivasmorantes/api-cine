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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('titulo');
            $table->date('estreno')->nullable();
            $table->decimal('taquilla', 15)->nullable();
            $table->string('pais', 100)->nullable();
            $table->integer('id_estudio')->nullable()->index('id_estudio');
            $table->integer('id_director')->nullable()->index('id_director');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peliculas');
    }
};
