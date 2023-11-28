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
        Schema::create('sm_usuarios', function (Blueprint $table) {
            $table->integer('id_usuario', true, true);
            $table->string('nombre', 100);
            $table->string('username', 100);
            $table->string('password_hash', 100);
            $table->string('estado_usuario', 1)->default('A');
            $table->integer('id_rol', false, true)->default(1);
            $table->foreign('id_rol')->references('id_rol')->on('sm_roles');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sm_usuarios');
    }
};
