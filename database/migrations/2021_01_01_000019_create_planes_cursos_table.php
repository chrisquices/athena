<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanesCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes_cursos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sede_id')->constrained('sedes')->onDelete('restrict');
            $table->foreignId('malla_curricular_id')->constrained('mallas_curriculares')->onDelete('restrict');
            $table->foreignId('grado_id')->constrained('grados')->onDelete('restrict');
            $table->string('turno')->nullable();
            $table->string('seccion')->nullable();
            $table->string('promedio_requerido')->nullable();
            $table->string('fecha_inicio')->nullable();
            $table->string('fecha_fin')->nullable();
            $table->string('estado')->default('Activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('planes_cursos');
    }
}
