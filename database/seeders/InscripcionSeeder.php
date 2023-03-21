<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class InscripcionSeeder extends Seeder
{
    public function run()
    {
        DB::table('inscripciones')->insert([
            [
                'plan_curso_id' => 1,
                'estudiante_id' => 1,
                'procedencia' => 'Colegio Privado "Las Mercedes"',
                'repitente' => 0,
                'traslado' => 0,
                'libreta_calificacion' => 1,
                'partida_nacimiento' => 1,
                'certificado_estudio' => 1,
                'foto' => 1,
                'ficha' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'plan_curso_id' => 1,
                'estudiante_id' => 2,
                'procedencia' => 'Colegio Privado "Las Mercedes"',
                'repitente' => 1,
                'traslado' => 0,
                'libreta_calificacion' => 1,
                'partida_nacimiento' => 1,
                'certificado_estudio' => 1,
                'foto' => 1,
                'ficha' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'plan_curso_id' => 1,
                'estudiante_id' => 3,
                'procedencia' => 'Colegio Privado "Las Mercedes"',
                'repitente' => 0,
                'traslado' => 1,
                'libreta_calificacion' => 1,
                'partida_nacimiento' => 1,
                'certificado_estudio' => 1,
                'foto' => 0,
                'ficha' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'plan_curso_id' => 1,
                'estudiante_id' => 4,
                'procedencia' => 'Colegio Privado "Las Mercedes"',
                'repitente' => 0,
                'traslado' => 0,
                'libreta_calificacion' => 1,
                'partida_nacimiento' => 1,
                'certificado_estudio' => 1,
                'foto' => 1,
                'ficha' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'plan_curso_id' => 1,
                'estudiante_id' => 5,
                'procedencia' => 'Colegio Privado "Las Mercedes"',
                'repitente' => 1,
                'traslado' => 1,
                'libreta_calificacion' => 1,
                'partida_nacimiento' => 1,
                'certificado_estudio' => 1,
                'foto' => 1,
                'ficha' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

								DB::table('inscripciones_planes_evaluaciones')->insert([
												[
																'inscripcion_id' => 1,
																'plan_evaluacion_id' => 1,
																'puntaje_logrado' => 40,
																'observacion' => '-',
																'estado' => 'Activo',
																'created_at' => now(),
																'updated_at' => now(),
												], [
																'inscripcion_id' => 2,
																'plan_evaluacion_id' => 1,
																'puntaje_logrado' => 50,
																'observacion' => '-',
																'estado' => 'Activo',
																'created_at' => now(),
																'updated_at' => now(),
												], [
																'inscripcion_id' => 3,
																'plan_evaluacion_id' => 1,
																'puntaje_logrado' => 60,
																'observacion' => '-',
																'estado' => 'Activo',
																'created_at' => now(),
																'updated_at' => now(),
												], [
																'inscripcion_id' => 4,
																'plan_evaluacion_id' => 1,
																'puntaje_logrado' => 70,
																'observacion' => '-',
																'estado' => 'Activo',
																'created_at' => now(),
																'updated_at' => now(),
												], [
																'inscripcion_id' => 5,
																'plan_evaluacion_id' => 1,
																'puntaje_logrado' => 80,
																'observacion' => '-',
																'estado' => 'Activo',
																'created_at' => now(),
																'updated_at' => now(),
												]
								]);
    }
}
