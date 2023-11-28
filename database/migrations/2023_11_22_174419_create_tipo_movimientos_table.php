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
        Schema::create('sm_tipo_movimientos', function (Blueprint $table) {
            $table->integer('id_tipo_movimiento', true, true);
            $table->string('descripcion_movimiento', 100);
            $table->string('operador', 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sm_tipo_movimientos');
    }
};
