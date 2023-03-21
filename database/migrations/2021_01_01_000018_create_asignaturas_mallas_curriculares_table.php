<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMallasCurricularesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mallas_curriculares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bachillerato_id')->constrained('bachilleratos')->onDelete('restrict');
            $table->string('nombre')->nullable();
            $table->string('ano')->nullable();
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
        Schema::dropIfExists('mallas_curriculares');
    }
}
