<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanesEvaluacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes_evaluaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_curso_id')->constrained('planes_cursos')->onDelete('restrict');
            $table->foreignId('tipo_evaluacion_id')->constrained('tipos_evaluaciones')->onDelete('restrict');
            $table->foreignId('plan_academico_id')->constrained('planes_academicos')->onDelete('restrict');
            $table->string('tema')->nullable();
												$table->integer('ponderacion')->nullable();
												$table->integer('etapa')->nullable();
            $table->date('fecha')->nullable();
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
        Schema::dropIfExists('planes_evaluaciones');
    }
}
