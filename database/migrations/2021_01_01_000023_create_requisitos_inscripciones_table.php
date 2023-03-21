<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitosInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitos_inscripciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_curso_id')->constrained('planes_cursos')->onDelete('restrict');
            $table->foreignId('requisito_id')->constrained('requisitos')->onDelete('restrict');
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
        Schema::dropIfExists('requisitos_inscripciones');
    }
}
