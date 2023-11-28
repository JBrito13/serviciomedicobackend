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
        Schema::create('sm_detalle_tratamientos', function (Blueprint $table) {
            $table->integer('id_det_tratamiento', true, true);
            $table->integer('id_tratamiento', false, true);
            $table->foreign('id_tratamiento')->references('id_tratamiento')->on('sm_tratamientos')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_concepto', false, true);
            $table->foreign('id_concepto')->references('id_concepto')->on('sm_conceptos')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('cantidad', false, true);
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
        Schema::dropIfExists('sm_detalle_tratamientos');
    }
};
