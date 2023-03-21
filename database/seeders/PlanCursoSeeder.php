<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PlanCursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('planes_cursos')->insert([[
            'sede_id' => 1,
            'malla_curricular_id' => 1,
            'grado_id' => 4,
            'turno' => 'Mañana',
            'seccion' => 'A',
            'promedio_requerido' => 80,
            'fecha_inicio' => now(),
            'fecha_fin' => now(),
            'estado' => 'Activo',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'sede_id' => 1,
            'malla_curricular_id' => 1,
            'grado_id' => 5,
            'turno' => 'Mañana',
            'seccion' => 'A',
            'promedio_requerido' => 80,
            'fecha_inicio' => now(),
            'fecha_fin' => now(),
            'estado' => 'Activo',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
