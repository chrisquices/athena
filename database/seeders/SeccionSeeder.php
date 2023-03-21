<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secciones')->insert([[
            'nombre' => 'A',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'B',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'nombre' => 'C',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
