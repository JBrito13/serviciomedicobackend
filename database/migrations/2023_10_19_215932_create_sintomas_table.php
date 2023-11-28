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
        Schema::create('sm_sintomas', function (Blueprint $table) {
            $table->integer('id_sintoma', true, true);
            $table->string('descripcion_sintoma', 100);
            $table->string('estado_sintoma', 1)->default('A');
            $table->integer('id_usuario', false, true)->default(1);
            $table->foreign('id_usuario')->references('id_usuario')->on('sm_usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sm_sintomas');
    }
};
