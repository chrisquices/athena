<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PlanAcademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('planes_academicos')->insert([
            [
                'plan_curso_id' => 1,
                'asignatura_id' => 6,
                'modalidad' => 'Presencial',
                'contenidos' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquet euismod auctor. Phasellus feugiat nibh at metus tincidunt eleifend. Donec et risus in quam dapibus tincidunt eu ut libero.</p>',
                'alcances' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquet euismod auctor. Phasellus feugiat nibh at metus tincidunt eleifend. Donec et risus in quam dapibus tincidunt eu ut libero.</p>',
                'instrumentos' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquet euismod auctor. Phasellus feugiat nibh at metus tincidunt eleifend. Donec et risus in quam dapibus tincidunt eu ut libero.</p>',
                'actividades' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquet euismod auctor. Phasellus feugiat nibh at metus tincidunt eleifend. Donec et risus in quam dapibus tincidunt eu ut libero.</p>',
                'estado' => 'Activo',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'plan_curso_id' => 1,
                'asignatura_id' => 2,
                'modalidad' => 'Presencial',
                'contenidos' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquet euismod auctor. Phasellus feugiat nibh at metus tincidunt eleifend. Donec et risus in quam dapibus tincidunt eu ut libero.</p>',
                'alcances' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquet euismod auctor. Phasellus feugiat nibh at metus tincidunt eleifend. Donec et risus in quam dapibus tincidunt eu ut libero.</p>',
                'instrumentos' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquet euismod auctor. Phasellus feugiat nibh at metus tincidunt eleifend. Donec et risus in quam dapibus tincidunt eu ut libero.</p>',
                'actividades' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquet euismod auctor. Phasellus feugiat nibh at metus tincidunt eleifend. Donec et risus in quam dapibus tincidunt eu ut libero.</p>',
                'estado' => 'Activo',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'plan_curso_id' => 1,
                'asignatura_id' => 3,
                'modalidad' => 'Presencial',
                'contenidos' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquet euismod auctor. Phasellus feugiat nibh at metus tincidunt eleifend. Donec et risus in quam dapibus tincidunt eu ut libero.</p>',
                'alcances' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquet euismod auctor. Phasellus feugiat nibh at metus tincidunt eleifend. Donec et risus in quam dapibus tincidunt eu ut libero.</p>',
                'instrumentos' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquet euismod auctor. Phasellus feugiat nibh at metus tincidunt eleifend. Donec et risus in quam dapibus tincidunt eu ut libero.</p>',
                'actividades' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquet euismod auctor. Phasellus feugiat nibh at metus tincidunt eleifend. Donec et risus in quam dapibus tincidunt eu ut libero.</p>',
                'estado' => 'Activo',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'plan_curso_id' => 1,
                'asignatura_id' => 4,
                'modalidad' => 'Presencial',
                'contenidos' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquet euismod auctor. Phasellus feugiat nibh at metus tincidunt eleifend. Donec et risus in quam dapibus tincidunt eu ut libero.</p>',
                'alcances' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquet euismod auctor. Phasellus feugiat nibh at metus tincidunt eleifend. Donec et risus in quam dapibus tincidunt eu ut libero.</p>',
                'instrumentos' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquet euismod auctor. Phasellus feugiat nibh at metus tincidunt eleifend. Donec et risus in quam dapibus tincidunt eu ut libero.</p>',
                'actividades' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquet euismod auctor. Phasellus feugiat nibh at metus tincidunt eleifend. Donec et risus in quam dapibus tincidunt eu ut libero.</p>',
                'estado' => 'Activo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
