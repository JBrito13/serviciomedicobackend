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
        Schema::create('sm_conceptos', function (Blueprint $table) {
            $table->integer('id_concepto', true, true);
            $table->string('codigo_concepto', 10)->unique();
            $table->string('descripcion_concepto', 100);
            $table->string('estado_concepto', 1);
            $table->integer('id_unidad', false, true);
            $table->foreign('id_unidad')->references('id_unidad')->on('sm_unidades');
            $table->integer('stock_minimo', false, true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sm_conceptos');
    }
};
