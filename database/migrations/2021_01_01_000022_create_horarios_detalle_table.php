<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios_detalle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('horario_id')->constrained('horarios')->onDelete('restrict');
            $table->foreignId('asignatura_id')->constrained('asignaturas')->onDelete('restrict');
            $table->foreignId('contrato_id')->nullable();
            $table->string('hora')->nullable();
            $table->string('hora_desde')->nullable();
            $table->string('hora_hasta')->nullable();
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
        Schema::dropIfExists('horarios_detalle');
    }
}
