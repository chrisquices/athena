<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SedeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sedes')->insert([[
            'nombre' => 'Caraguatay',
            'acronimo' => 'CTY',
            'telefono' => '(0517)222-440',
            'direccion' => 'Teniente Roja Silva con Ruta Caraguatay 733',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Capiata',
            'acronimo' => 'CAP',
            'telefono' => '(0021)385-385',
            'direccion' => 'Teniente Roja Silva con Ruta 733',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
