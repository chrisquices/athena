<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanesAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes_academicos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_curso_id')->constrained('planes_cursos')->onDelete('restrict');
            $table->foreignId('asignatura_id')->constrained('asignaturas')->onDelete('restrict');
            $table->string('modalidad')->nullable();
            $table->text('contenidos')->nullable();
            $table->text('alcances')->nullable();
            $table->text('instrumentos')->nullable();
            $table->text('actividades')->nullable();
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
        Schema::dropIfExists('planes_academicos');
    }
}
