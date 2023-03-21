<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class GuardianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guardianes')->insert([[
            'ciudad_id' => 1,
            'nombre' => 'Leon',
            'apellido' => 'Degree',
            'documento_tipo' => 'Cedula de Identidad',
            'documento_numero' => '39343943',
            'direccion' => '947 Chapmans Lane',
            'telefono' => '(0517)-194-395',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'ciudad_id' => 2,
            'nombre' => 'Jill',
            'apellido' => 'McCready',
            'documento_tipo' => 'Cedula de Identidad',
            'documento_numero' => '8242949',
            'direccion' => '3555 Hall Street',
            'telefono' => '(0517)-729-583',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'ciudad_id' => 2,
            'nombre' => 'Shanda',
            'apellido' => 'Crowl',
            'documento_tipo' => 'Cedula de Identidad',
            'documento_numero' => '9835827',
            'direccion' => '2980 Hill Street',
            'telefono' => '(0517)-573-483',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'ciudad_id' => 1,
            'nombre' => 'Andrea',
            'apellido' => 'Bailey',
            'documento_tipo' => 'Cedula de Identidad',
            'documento_numero' => '5832757',
            'direccion' => '2186 Stratford Park',
            'telefono' => '(0517)-934-394',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'ciudad_id' => 3,
            'nombre' => 'Rachel',
            'apellido' => 'Short',
            'documento_tipo' => 'Cedula de Identidad',
            'documento_numero' => '4837593',
            'direccion' => '3485 Camel Back Road',
            'telefono' => '(0517)-943-493',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'ciudad_id' => 3,
            'nombre' => 'Russel',
            'apellido' => 'Milburn',
            'documento_tipo' => 'Cedula de Identidad',
            'documento_numero' => '9848334',
            'direccion' => 'Teniente Roja silva c/ Comandante Lara',
            'telefono' => '(0517)-729-583',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'ciudad_id' => 1,
            'nombre' => 'Merle',
            'apellido' => 'Wright',
            'documento_tipo' => 'Cedula de Identidad',
            'documento_numero' => '8724284',
            'direccion' => '360 Ashcraft Court',
            'telefono' => '(0517)-573-483',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'ciudad_id' => 4,
            'nombre' => 'Bradley',
            'apellido' => 'King',
            'documento_tipo' => 'Cedula de Identidad',
            'documento_numero' => '4983484',
            'direccion' => '1619 Commerce Boulevard',
            'telefono' => '(0517)-934-394',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'ciudad_id' => 3,
            'nombre' => 'Carolyn',
            'apellido' => 'Spencer',
            'documento_tipo' => 'Cedula de Identidad',
            'documento_numero' => '9849244',
            'direccion' => '4974 Rocket Drive',
            'telefono' => '(0517)-729-583',
            'created_at' => now(),
            'updated_at' => now(),
        ], [
            'ciudad_id' => 1,
            'nombre' => 'William',
            'apellido' => 'Parsons',
            'documento_tipo' => 'Cedula de Identidad',
            'documento_numero' => '6724784',
            'direccion' => '633 Rowes Lane',
            'telefono' => '(0517)-573-483',
            'created_at' => now(),
            'updated_at' => now(),
        ]]);
    }
}
