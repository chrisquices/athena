<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PlanEvaluacionSeeder extends Seeder	{

				/**
					* Run the database seeds.
					*
					* @return void
					*/
				public function run()
				{
								DB::table('planes_evaluaciones')->insert([
												[
																'plan_curso_id'      => 1,
																'tipo_evaluacion_id' => 1,
																'plan_academico_id'  => 1,
																'tema'               => 'Avogado',
																'ponderacion'        => 80,
																'etapa'              => 1,
																'fecha'              => now(),
																'created_at'         => now(),
																'updated_at'         => now(),
												], [
																'plan_curso_id'      => 1,
																'tipo_evaluacion_id' => 1,
																'plan_academico_id'  => 1,
																'tema'               => 'Oxigeno y sus atributos',
																'ponderacion'        => 80,
																'etapa'              => 1,
																'fecha'              => now(),
																'created_at'         => now(),
																'updated_at'         => now(),
												], [
																'plan_curso_id'      => 1,
																'tipo_evaluacion_id' => 2,
																'plan_academico_id'  => 1,
																'tema'               => 'Ligaduras',
																'ponderacion'        => 80,
																'etapa'              => 1,
																'fecha'              => now(),
																'created_at'         => now(),
																'updated_at'         => now(),
												], [
																'plan_curso_id'      => 1,
																'tipo_evaluacion_id' => 2,
																'plan_academico_id'  => 1,
																'tema'               => 'Pequeñas oscilaciones',
																'ponderacion'        => 80,
																'etapa'              => 1,
																'fecha'              => now(),
																'created_at'         => now(),
																'updated_at'         => now(),
												], [
																'plan_curso_id'      => 1,
																'tipo_evaluacion_id' => 3,
																'plan_academico_id'  => 1,
																'tema'               => 'Ecuaciones de Hamilton',
																'ponderacion'        => 80,
																'etapa'              => 1,
																'fecha'              => now(),
																'created_at'         => now(),
																'updated_at'         => now(),
												],
								]);
				}

}
