<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciasOperativoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias_operativo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contrato_id')->constrained('contratos')->onDelete('restrict');
												$table->foreignId('horario_detalle_id')->constrained(   'horarios_detalle')->onDelete('restrict');
												$table->foreignId('reemplazante_id')->nullable()->constrained(   'horarios_detalle')->onDelete('restrict');
            $table->date('fecha')->nullable();
            $table->string('estado')->default('Presente');
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
        Schema::dropIfExists('asistencias_operativo');
    }
}
