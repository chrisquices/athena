<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ReemplazanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reemplazantes')->insert([
            [
                'nombre' => 'Anita',
                'apellido' => 'Heron',
                'telefono' => '0976595855',
                'direccion' => '826 Viking Drive',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'nombre' => 'Mary',
                'apellido' => 'D. White',
                'telefono' => '0985358355',
                'direccion' => '2423 Bee Street',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'nombre' => 'Helen',
                'apellido' => 'A. Vann',
                'telefono' => '098358359',
                'direccion' => '4627 Church Street',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'nombre' => 'Tad',
                'apellido' => 'E. John',
                'telefono' => '0976595855',
                'direccion' => '71 Tuna Street',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'nombre' => 'Carl',
                'apellido' => 'B. Peed',
                'telefono' => '0942854545',
                'direccion' => '3444 Hillhaven Drive',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'nombre' => 'Charles',
                'apellido' => 'G. Markle',
                'telefono' => '098535845',
                'direccion' => '3081 Cantebury Drive',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'nombre' => 'Fred',
                'apellido' => 'D. Rogers',
                'telefono' => '0935385935',
                'direccion' => '2739 Highland Drive',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'nombre' => 'Felicitas',
                'apellido' => 'B. York',
                'telefono' => '0999385359',
                'direccion' => '1160 Millbrook Road',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'nombre' => 'Brenda',
                'apellido' => 'E. Ewing',
                'telefono' => '0929484943',
                'direccion' => '2254 Indiana Avenue',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'nombre' => 'Claudia',
                'apellido' => 'Bowman',
                'telefono' => '0928429434',
                'direccion' => '2200 Bell Street',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('asignaturas_postulantes')->insert([
            [
                'asignatura_id' => 1,
                'postulante_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'asignatura_id' => 2,
                'postulante_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
