<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->insert([[
            'nombre' => 'Lengua, Literatura y sus Tecnologias',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Ciencias Basicas y sus Tecnologias',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Matematica y sus Tecnologias',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Ciencias Sociales y sus Tecnologias',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Educacion Fisica y sus Tecnologias',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Artes y sus Tecnologias',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Desarrollo Personal y Social',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Disciplinas del Enfasis',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
