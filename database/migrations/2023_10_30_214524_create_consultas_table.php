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
        Schema::create('sm_consultas', function (Blueprint $table) {
            $table->integer('id_consulta', true, true);
            $table->integer('numero_consulta', false, true);
            $table->integer('id_persona', false, true)->nullable();
            $table->foreign('id_persona')->references('id_persona')->on('personas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('cedula_paciente', 20);
            $table->string('nombre_paciente', 200);
            $table->integer('tipo_paciente', false, false)->default(4);
            $table->text('observaciones')->nullable();
            $table->dateTime('fecha_consulta');
            $table->string('estado_consulta', 1)->default('A');
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
        Schema::dropIfExists('sm_consultas');
    }
};
