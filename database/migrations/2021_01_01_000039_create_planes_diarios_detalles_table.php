<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanesDiariosDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planes_diarios_detalles', function (Blueprint $table) {
            $table->id();
												$table->foreignId('plan_diario_id')->constrained('planes_diarios')->onDelete('restrict');
												$table->date('fecha')->nullable();
												$table->text('contenido_desarrollado')->nullable();
												$table->text('observacion')->nullable();
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
        Schema::dropIfExists('planes_diarios_detalles');
    }
}
