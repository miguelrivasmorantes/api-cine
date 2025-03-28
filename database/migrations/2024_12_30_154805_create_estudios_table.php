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
        Schema::create('estudios', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombre');
            $table->string('pais', 100)->nullable();
            $table->date('fundacion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudios');
    }
};
