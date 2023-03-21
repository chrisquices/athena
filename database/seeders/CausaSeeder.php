<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CausaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('causas')->insert([[
            'tipo' => 'Deserción',
            'nombre' => 'Motivos Economicos',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'tipo' => 'Justificativo',
            'nombre' => 'Motivos Economicos',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'tipo' => 'Justificativo',
            'nombre' => 'Agresion Fisica',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'tipo' => 'Sanción',
            'nombre' => 'Agresion Verbal',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'tipo' => 'Permiso',
            'nombre' => 'Enfermedad',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'tipo' => 'Permiso',
            'nombre' => 'Otras causas',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'tipo' => 'Sanción',
            'nombre' => 'No se',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
