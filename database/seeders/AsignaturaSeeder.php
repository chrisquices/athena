<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('asignaturas')->insert([[
            'area_id' => 1,
            'nombre' => 'Lengua Castellana y Literatura',
            'acronimo' => 'CAS',
        ], [
            'area_id' => 1,
            'nombre' => "Guarani Ñe'e",
            'acronimo' => 'GUA',
        ], [
            'area_id' => 1,
            'nombre' => 'Lengua Extranjera',
            'acronimo' => 'ING',
        ], [
            'area_id' => 2,
            'nombre' => 'Ciencias Naturales y Salud',
            'acronimo' => 'CIE',
        ], [
            'area_id' => 2,
            'nombre' => 'Fisica',
            'acronimo' => 'FIS',
        ], [
            'area_id' => 2,
            'nombre' => 'Quimica',
            'acronimo' => 'QUI',
        ], [
            'area_id' => 3,
            'nombre' => 'Matematica',
            'acronimo' => 'MAT',
        ], [
            'area_id' => 4,
            'nombre' => 'Historia y Geografia',
            'acronimo' => 'HIS',
        ], [
            'area_id' => 4,
            'nombre' => 'Formacion Etica y Ciudadana',
            'acronimo' => 'ETI',
        ], [
            'area_id' => 4,
            'nombre' => 'Psicologia',
            'acronimo' => 'PSI',
        ], [
            'area_id' => 4,
            'nombre' => 'Economia y Gestion',
            'acronimo' => 'ECO',
        ], [
            'area_id' => 4,
            'nombre' => 'Filosofia',
            'acronimo' => 'FIL',
        ], [
            'area_id' => 4,
            'nombre' => 'Antropologia Social',
            'acronimo' => 'ANT',
        ], [
            'area_id' => 5,
            'nombre' => 'Educacion Fisica',
            'acronimo' => 'EDU',
        ], [
            'area_id' => 6,
            'nombre' => 'Artes',
            'acronimo' => 'ART',
        ], [
            'area_id' => 7,
            'nombre' => 'O7rientacion Educacional y Sociolaboral',
            'acronimo' => 'ORI',
        ], [
            'area_id' => 7,
            'nombre' => 'Servicio Social y Productivo en la Comunidad',
            'acronimo' => 'ECO',
        ], [
            'area_id' => 8,
            'nombre' => 'Logica Matematica',
            'acronimo' => 'LOG',
        ], [
            'area_id' => 8,
            'nombre' => 'Estadistica',
            'acronimo' => 'EST',
        ], [
            'area_id' => 8,
            'nombre' => 'Geologia',
            'acronimo' => 'GEO',
        ], [
            'area_id' => 8,
            'nombre' => 'Educacion Ambiental y Salud',
            'acronimo' => 'AMB',
        ], [
            'area_id' => 8,
            'nombre' => 'Biologia',
            'acronimo' => 'BIO',
        ]]);
    }
}
