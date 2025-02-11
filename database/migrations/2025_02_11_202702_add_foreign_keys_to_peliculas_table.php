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
        Schema::table('peliculas', function (Blueprint $table) {
            $table->foreign(['id_estudio'], 'peliculas_ibfk_1')->references(['id'])->on('estudios')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_director'], 'peliculas_ibfk_2')->references(['id'])->on('directores')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peliculas', function (Blueprint $table) {
            $table->dropForeign('peliculas_ibfk_1');
            $table->dropForeign('peliculas_ibfk_2');
        });
    }
};
