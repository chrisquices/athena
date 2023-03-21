<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grados')->insert([[
            'nombre' => '7mo',
            'nombre_alternativo' => 'Séptimo Grado',
            'nivel' => 'Educación Escolar Básica',
            'nivel_acronimo' => 'EEB',
            'tiene_bachillerato' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => '8vo',
            'nombre_alternativo' => 'Octavo Grado',
            'nivel' => 'Educación Escolar Básica',
            'nivel_acronimo' => 'EEB',
            'tiene_bachillerato' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => '9',
            'nombre_alternativo' => 'Noveno Grado',
            'nivel' => 'Educación Escolar Básica',
            'nivel_acronimo' => 'EEB',
            'tiene_bachillerato' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => '1er',
            'nombre_alternativo' => 'Primer Curso',
            'nivel' => 'Educación Media',
            'nivel_acronimo' => 'EM',
            'tiene_bachillerato' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => '2do',
            'nombre_alternativo' => 'Segundo Curso',
            'nivel' => 'Educación Media',
            'nivel_acronimo' => 'EM',
            'tiene_bachillerato' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => '3ro',
            'nombre_alternativo' => 'Tercer Curso',
            'nivel' => 'Educación Media',
            'nivel_acronimo' => 'EM',
            'tiene_bachillerato' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
