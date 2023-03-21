<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciasDocumentalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias_documental', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_academico_id')->constrained('planes_academicos')->onDelete('restrict');
            $table->foreignId('inscripcion_id')->constrained('inscripciones')->onDelete('restrict');
            $table->date('fecha')->nullable();
            $table->string('estado')->default('Ausente');
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
        Schema::dropIfExists('asistencias_documental');
    }
}
