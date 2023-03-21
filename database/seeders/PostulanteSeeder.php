<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PostulanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('postulantes')->insert([
            [
                'ciudad_id' => 1,
                'nombre' => 'Anita',
                'apellido' => 'Heron',
                'telefono' => '0976595855',
                'direccion' => '826 Viking Drive',
                'documento_tipo' => 'Cédula de Identidad',
                'documento_numero' => '3524545',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'ciudad_id' => 1,
                'nombre' => 'Mary',
                'apellido' => 'D. White',
                'telefono' => '0985358355',
                'direccion' => '2423 Bee Street',
                'documento_tipo' => 'Cédula de Identidad',
                'documento_numero' => '9835399',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'ciudad_id' => 1,
                'nombre' => 'Helen',
                'apellido' => 'A. Vann',
                'telefono' => '098358359',
                'direccion' => '4627 Church Street',
                'documento_tipo' => 'Cédula de Identidad',
                'documento_numero' => '5245855',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'ciudad_id' => 1,
                'nombre' => 'Tad',
                'apellido' => 'E. John',
                'telefono' => '0976595855',
                'direccion' => '71 Tuna Street',
                'documento_tipo' => 'Cédula de Identidad',
                'documento_numero' => '3524545',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'ciudad_id' => 1,
                'nombre' => 'Carl',
                'apellido' => 'B. Peed',
                'telefono' => '0942854545',
                'direccion' => '3444 Hillhaven Drive',
                'documento_tipo' => 'Cédula de Identidad',
                'documento_numero' => '8549585',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'ciudad_id' => 1,
                'nombre' => 'Charles',
                'apellido' => 'G. Markle',
                'telefono' => '098535845',
                'direccion' => '3081 Cantebury Drive',
                'documento_tipo' => 'Cédula de Identidad',
                'documento_numero' => '7523955',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'ciudad_id' => 1,
                'nombre' => 'Fred',
                'apellido' => 'D. Rogers',
                'telefono' => '0935385935',
                'direccion' => '2739 Highland Drive',
                'documento_tipo' => 'Cédula de Identidad',
                'documento_numero' => '18493494',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'ciudad_id' => 1,
                'nombre' => 'Felicitas',
                'apellido' => 'B. York',
                'telefono' => '0999385359',
                'direccion' => '1160 Millbrook Road',
                'documento_tipo' => 'Cédula de Identidad',
                'documento_numero' => '9359835',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'ciudad_id' => 1,
                'nombre' => 'Brenda',
                'apellido' => 'E. Ewing',
                'telefono' => '0929484943',
                'direccion' => '2254 Indiana Avenue',
                'documento_tipo' => 'Cédula de Identidad',
                'documento_numero' => '34983489',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'ciudad_id' => 1,
                'nombre' => 'Claudia',
                'apellido' => 'Bowman',
                'telefono' => '0928429434',
                'direccion' => '2200 Bell Street',
                'documento_tipo' => 'Cédula de Identidad',
                'documento_numero' => '83593505',
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
