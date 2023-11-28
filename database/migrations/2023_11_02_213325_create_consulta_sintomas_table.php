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
        Schema::create('sm_consulta_sintomas', function (Blueprint $table) {
            $table->integer('id_consulta_sintoma', true, true);
            $table->integer('id_consulta', false, true);
            $table->foreign('id_consulta')->references('id_consulta')->on('sm_consultas')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_sintoma', false, true);
            $table->foreign('id_sintoma')->references('id_sintoma')->on('sm_sintomas')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_usuario', false, true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sm_consulta_sintomas');
    }
};
