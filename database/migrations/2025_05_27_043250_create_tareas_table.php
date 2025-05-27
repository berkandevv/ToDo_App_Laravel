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
        Schema::create('tareas', function (Blueprint $table) {
            $table->integer('ID_Tarea', true);
            $table->string('Tarea');
            $table->enum('Estado', ['Pendiente', 'Terminada'])->default('Pendiente');
            $table->dateTime('Fecha_Creacion')->nullable()->useCurrent();
            $table->dateTime('Fecha_Completado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tareas');
    }
};
