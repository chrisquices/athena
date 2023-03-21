<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturasPostulantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas_postulantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asignatura_id')->constrained('asignaturas')->onDelete('restrict');
            $table->foreignId('postulante_id')->constrained('postulantes')->onDelete('restrict');
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
        Schema::dropIfExists('asignaturas_postulantes');
    }
}
