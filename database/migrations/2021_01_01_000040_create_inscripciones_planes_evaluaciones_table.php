<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionesPlanesEvaluacionesTable extends Migration
{
    public function up()
    {
        Schema::create('inscripciones_planes_evaluaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inscripcion_id')->constrained('inscripciones')->onDelete('restrict');
            $table->foreignId('plan_evaluacion_id')->constrained('planes_evaluaciones')->onDelete('restrict');
												$table->string('puntaje_logrado')->default(0);
												$table->string('observacion')->default('-');
												$table->string('estado')->default('Activo');
												$table->timestamps();
								});
    }

    public function down()
    {
        Schema::dropIfExists('inscripciones_planes_evaluaciones');
    }
}
