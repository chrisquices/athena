<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturasMallasCurricularesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas_mallas', function (Blueprint $table) {
            $table->foreignId('malla_curricular_id')->constrained('mallas_curriculares')->onDelete('restrict');
            $table->foreignId('grado_id')->constrained('grados')->onDelete('restrict');
            $table->foreignId('asignatura_id')->constrained('asignaturas')->onDelete('restrict');
            $table->string('plan')->nullable();
            $table->string('horas_catedras')->nullable();
            $table->string('ano')->nullable();
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
        Schema::dropIfExists('asignaturas_mallas');
    }
}
