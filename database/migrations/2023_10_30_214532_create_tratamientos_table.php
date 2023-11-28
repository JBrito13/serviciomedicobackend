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
        Schema::create('sm_tratamientos', function (Blueprint $table) {
            $table->integer('id_tratamiento', true, true);
            $table->integer('id_consulta', false, true);
            $table->foreign('id_consulta')->references('id_consulta')->on('sm_consultas')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_diagnostico', false, true);
            $table->foreign('id_diagnostico')->references('id_diagnostico')->on('sm_diagnosticos')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_usuario', false, true)->default(1);
            $table->foreign('id_usuario')->references('id_usuario')->on('sm_usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sm_tratamientos');
    }
};
