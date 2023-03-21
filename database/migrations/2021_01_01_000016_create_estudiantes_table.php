<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guardian_id')->constrained('guardianes')->onDelete('restrict');
            $table->foreignId('nacionalidad_id')->constrained('nacionalidades')->onDelete('restrict');
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('documento_tipo')->nullable();
            $table->string('documento_numero')->unique()->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('sexo')->nullable();
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
        Schema::dropIfExists('estudiantes');
    }
}
