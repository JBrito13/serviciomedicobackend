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
        Schema::create('sm_movimientos', function (Blueprint $table) {
            $table->integer('id_movimiento', true, true);
            $table->integer('nro_control', false, true);
            $table->integer('id_tipo_movimiento', false, true);
            $table->foreign('id_tipo_movimiento')->references('id_tipo_movimiento')->on('sm_tipo_movimientos')->onDelete('cascade')->onUpdate('cascade');
            $table->dateTime('fecha_movimiento');
            $table->text('observaciones')->nullable();
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
        Schema::dropIfExists('movimientos');
    }
};
