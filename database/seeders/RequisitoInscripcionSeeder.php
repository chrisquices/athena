<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RequisitoInscripcionSeeder extends Seeder {

				/**
					* Run the database seeds.
					*
					* @return void
					*/
				public function run()
				{
								DB::table('requisitos_inscripciones')->insert([
												[
																'plan_curso_id' => 1,
																'requisito_id'  => 1,
																'created_at'    => now(),
																'updated_at'    => now(),
												], [
																'plan_curso_id' => 1,
																'requisito_id'  => 2,
																'created_at'    => now(),
																'updated_at'    => now(),
												], [
																'plan_curso_id' => 1,
																'requisito_id'  => 3,
																'created_at'    => now(),
																'updated_at'    => now(),
												], [
																'plan_curso_id' => 1,
																'requisito_id'  => 4,
																'created_at'    => now(),
																'updated_at'    => now(),
												],
								]);

								DB::table('requisitos_inscripciones')->insert([
												[
																'plan_curso_id' => 2,
																'requisito_id'  => 1,
																'created_at'    => now(),
																'updated_at'    => now(),
												], [
																'plan_curso_id' => 2,
																'requisito_id'  => 2,
																'created_at'    => now(),
																'updated_at'    => now(),
												], [
																'plan_curso_id' => 2,
																'requisito_id'  => 3,
																'created_at'    => now(),
																'updated_at'    => now(),
												], [
																'plan_curso_id' => 2,
																'requisito_id'  => 4,
																'created_at'    => now(),
																'updated_at'    => now(),
												],
								]);
				}

}
