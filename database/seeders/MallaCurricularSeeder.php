<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class MallaCurricularSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mallas_curriculares')->insert([[
            'bachillerato_id' => '1',
            'nombre' => 'Bachillerato Cientifico con Enfasis en Ciencias Basicas y Tecnologia',
            'ano' => '2021',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);

        DB::table('asignaturas_mallas')->insert([
            [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 1,
                'grado_id' => 4,
                'horas_catedras' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 2,
                'grado_id' => 4,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 3,
                'grado_id' => 4,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 4,
                'grado_id' => 4,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 7,
                'grado_id' => 4,
                'horas_catedras' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 8,
                'grado_id' => 4,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 10,
                'grado_id' => 4,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 13,
                'grado_id' => 4,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 14,
                'grado_id' => 4,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 15,
                'grado_id' => 4,
                'horas_catedras' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Especifico',
                'asignatura_id' => 18,
                'grado_id' => 4,
                'horas_catedras' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Especifico',
                'asignatura_id' => 20,
                'grado_id' => 4,
                'horas_catedras' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Especifico',
                'asignatura_id' => 21,
                'grado_id' => 4,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 1,
                'grado_id' => 5,
                'horas_catedras' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 2,
                'grado_id' => 5,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 3,
                'grado_id' => 5,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 4,
                'grado_id' => 5,
                'horas_catedras' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 5,
                'grado_id' => 5,
                'horas_catedras' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 6,
                'grado_id' => 5,
                'horas_catedras' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 7,
                'grado_id' => 5,
                'horas_catedras' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 8,
                'grado_id' => 5,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 9,
                'grado_id' => 5,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 12,
                'grado_id' => 5,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 14,
                'grado_id' => 5,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 15,
                'grado_id' => 5,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Especifico',
                'asignatura_id' => 19,
                'grado_id' => 5,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 2,
                'grado_id' => 6,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 1,
                'grado_id' => 6,
                'horas_catedras' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 2,
                'grado_id' => 6,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 3,
                'grado_id' => 6,
                'horas_catedras' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 5,
                'grado_id' => 6,
                'horas_catedras' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 6,
                'grado_id' => 6,
                'horas_catedras' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 7,
                'grado_id' => 6,
                'horas_catedras' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 8,
                'grado_id' => 6,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 11,
                'grado_id' => 6,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 14,
                'grado_id' => 6,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Comun',
                'asignatura_id' => 16,
                'grado_id' => 6,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Especifico',
                'asignatura_id' => 6,
                'grado_id' => 6,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Especifico',
                'asignatura_id' => 5,
                'grado_id' => 6,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'malla_curricular_id' => 1,
                'plan' => 'Especifico',
                'asignatura_id' => 22,
                'grado_id' => 6,
                'horas_catedras' => 4,
                'created_at' => now(),
                'updated_at' => now(),
                'grado_id' => 6,
                'horas_catedras' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
