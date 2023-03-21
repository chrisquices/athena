<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TipoEvaluacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_evaluaciones')->insert([[
            'nombre' => 'Trabajo Practico',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Examen',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Examen Ordinario',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Examen Extraordinario',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
