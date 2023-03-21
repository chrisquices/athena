<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanesDiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes_diarios', function (Blueprint $table) {
            $table->id();
												$table->foreignId('contrato_id')->constrained('contratos')->onDelete('restrict');
												$table->foreignId('plan_curso_id')->constrained('planes_cursos')->onDelete('restrict');
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
        Schema::dropIfExists('planes_diarios');
    }
}
