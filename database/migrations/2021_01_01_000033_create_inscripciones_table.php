<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estudiante_id')->constrained('estudiantes')->onDelete('restrict');
            $table->foreignId('plan_curso_id')->constrained('planes_cursos')->onDelete('restrict');
            $table->string('procedencia')->nullable();
            $table->boolean('repitente')->nullable();
            $table->boolean('traslado')->nullable();
            $table->boolean('libreta_calificacion')->nullable();
            $table->boolean('partida_nacimiento')->nullable();
            $table->boolean('certificado_estudio')->nullable();
            $table->boolean('foto')->nullable();
            $table->boolean('ficha')->nullable();
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
        Schema::dropIfExists('inscripciones');
    }
}
