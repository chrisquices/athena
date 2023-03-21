<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BachilleratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bachilleratos')->insert([[
            'nombre' => 'Bachillerato en Algo Nuevo',
            'acronimo' => 'BAN',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Bachillerato en Ciencias Básicas',
            'acronimo' => 'BCB',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Bachillerato en Ciencias Sociales',
            'acronimo' => 'BCS',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Bachillerato Técnico en Informática',
            'acronimo' => 'BTI',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Bachillerato en Artes',
            'acronimo' => 'BA',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
