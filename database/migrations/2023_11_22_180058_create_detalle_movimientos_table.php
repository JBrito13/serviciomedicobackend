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
        Schema::create('sm_detalle_movimientos', function (Blueprint $table) {
            $table->integer('id_detalle_movimiento', true, true);
            $table->integer('id_movimiento', false, true);
            $table->foreign('id_movimiento')->references('id_movimiento')->on('sm_movimientos')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_concepto', false, true);
            $table->foreign('id_concepto')->references('id_concepto')->on('sm_conceptos')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('cantidad_anterior', false, true);
            $table->integer('cantidad_actual', false, true);
            $table->integer('cantidad_movimiento', false, true);
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
        Schema::dropIfExists('sm_detalle_movimientos');
    }
};
