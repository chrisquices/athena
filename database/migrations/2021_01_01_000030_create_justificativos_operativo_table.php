<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJustificativosOperativoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('justificativos_operativo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asistencia_operativo_id')->constrained('asistencias_operativo')->onDelete('restrict');
            $table->foreignId('contrato_id')->constrained('contratos')->onDelete('restrict');
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
        Schema::dropIfExists('justificativos_operativo');
    }
}
