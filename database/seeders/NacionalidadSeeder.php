<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class NacionalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nacionalidades')->insert([[
            'nombre' => 'Paraguayo',
            'acronimo' => 'PY',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Estadounidense',
            'acronimo' => 'US',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Canadiense',
            'acronimo' => 'CAN',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Japones',
            'acronimo' => 'JP',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'Ruso',
            'acronimo' => 'RS',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
