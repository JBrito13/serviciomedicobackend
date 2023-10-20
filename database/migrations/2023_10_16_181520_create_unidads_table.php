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
        Schema::create('sm_unidades', function (Blueprint $table) {
            $table->integer('id_unidad', true, true);
            $table->string('descripcion_unidad', 100);
            $table->string('estado_unidad', 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sm_unidades');
    }
};
