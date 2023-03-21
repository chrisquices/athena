<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RequisitoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('requisitos')->insert([[
            'nombre' => '2 fotocopias de la cédula de identidad o pasaporte del menor',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => '2 fotocopias de la cédula de identidad o pasaporte del guardián',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => '1 certificado de nacimiento del menor',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => '1 antecedente académico (en caso de traslado)',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
