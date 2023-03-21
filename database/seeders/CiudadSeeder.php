<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ciudades')->insert([[
            'nombre' => 'Caraguatay',
            'acronimo' => 'CTY',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Asunción',
            'acronimo' => 'ASU',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Fernando de la Mora',
            'acronimo' => 'FDO',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Capiatá',
            'acronimo' => 'CAP',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'San Lorenzo',
            'acronimo' => 'SL',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
