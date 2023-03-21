<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AsistenciaSeeder extends Seeder {

				/**
					* Run the database seeds.
					*
					* @return void
					*/
				public function run()
				{
								DB::table('asistencias_operativo')->insert([
												[
																'contrato_id'        => 1,
																'horario_detalle_id' => 1,
																'reemplazante_id'    => null,
																'fecha'              => '2021-10-01',
																'estado'             => 'Ausente',
																'created_at'         => now(),
																'updated_at'         => now(),
												], [
																'contrato_id'        => 1,
																'horario_detalle_id' => 1,
																'reemplazante_id'    => null,
																'fecha'              => '2021-10-02',
																'estado'             => 'Ausente',
																'created_at'         => now(),
																'updated_at'         => now(),
												], [
																'contrato_id'        => 1,
																'horario_detalle_id' => 1,
																'reemplazante_id'    => null,
																'fecha'              => '2021-10-03',
																'estado'             => 'Ausente',
																'created_at'         => now(),
																'updated_at'         => now(),
												],
								]);
				}

}
