<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJustificativosDocumentalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('justificativos_documental', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asistencia_documental_id')->constrained('asistencias_documental')->onDelete('restrict');
            $table->foreignId('inscripcion_id')->constrained('inscripciones')->onDelete('restrict');
            $table->foreignId('causa_id')->constrained('causas')->onDelete('restrict');
            $table->string('observacion')->nullable();
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
        Schema::dropIfExists('justificativos_documental');
    }
}
