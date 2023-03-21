<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contratos')->insert([[
            'asignatura_id' => 1,
            'postulante_id' => 1,
            'clausulas' => '<p>Lorem ipsum</p>',
            'fecha_inicio' => now(),
            'salario' => 4000000,
            'estado' => 'Activo',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'asignatura_id' => 2,
            'postulante_id' => 2,
            'clausulas' => '<p>Lorem ipsum</p>',
            'fecha_inicio' => now(),
            'salario' => 4000000,
            'estado' => 'Activo',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'asignatura_id' => 3,
            'postulante_id' => 3,
            'clausulas' => '<p>Lorem ipsum</p>',
            'fecha_inicio' => now(),
            'salario' => 4000000,
            'estado' => 'Activo',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'asignatura_id' => 4,
            'postulante_id' => 4,
            'clausulas' => '<p>Lorem ipsum</p>',
            'fecha_inicio' => now(),
            'salario' => 4000000,
            'estado' => 'Activo',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'asignatura_id' => 5,
            'postulante_id' => 5,
            'clausulas' => '<p>Lorem ipsum</p>',
            'fecha_inicio' => now(),
            'salario' => 4000000,
            'estado' => 'Activo',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'asignatura_id' => 6,
            'postulante_id' => 6,
            'clausulas' => '<p>Lorem ipsum</p>',
            'fecha_inicio' => now(),
            'salario' => 4000000,
            'estado' => 'Activo',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'asignatura_id' => 7,
            'postulante_id' => 7,
            'clausulas' => '<p>Lorem ipsum</p>',
            'fecha_inicio' => now(),
            'salario' => 4000000,
            'estado' => 'Activo',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);

        DB::table('contratos_users')->insert([[
            'contrato_id' => 1,
            'user_id' => 5,
            'estado' => 'Activo',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
