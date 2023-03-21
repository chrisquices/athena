<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PlanDiarioSeeder extends Seeder
{
    public function run()
    {
								$a = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porta mauris a turpis volutpat dictum. Suspendisse consequat pulvinar aliquet. Sed cursus felis lectus, in pretium ipsum efficitur id.';
								$b = 'Donec cursus augue id tincidunt bibendum. Donec eu convallis enim. Vestibulum at arcu eget diam viverra viverra. Morbi facilisis sit amet lacus sed vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;';
								$c = 'Praesent lobortis mauris  vitae varius quam efficitur nec. Donec ac pretium eros, id fringilla ante. Aenean non volutpat ligula. Maecenas sed tellus at enim porta dignissim sed id mi.';
								$d = 'Aenean sed orci in mauris pulvinar ultrices et sit amet risus. Ut non dolor odio. Pellentesque ornare, justo eu interdum tempus, turpis ligula mattis ex, id ornare lectus tellus sed turpis.';
								$e = 'Etiam consequat odio a mollis viverra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque justo justo, ornare a nisl eu, aliquet posuere tellus.';
								$f = 'Mauris venenatis feugiat condimentum. Quisque et ante urna. Nullam id dolor urna. Donec ac maximus lacus. Pellentesque sed ornare lectus. Proin tristique risus ut diam aliquam pellentesque.';
								$g = 'Donec nec augue nulla. Vestibulum ut enim eu nisl cursus iaculis et a nibh. Aliquam erat volutpat. Quisque in eros ac justo convallis sodales.';

								$lorem= [$a, $b, $c, $d, $e, $f, $g];


        DB::table('planes_diarios')->insert([
            [
																'contrato_id' => 1,
																'plan_curso_id' => 1,
																'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

								for ($i = 1; $i < 30; $i++) {
												$random_number = rand(0, 6);

												DB::table('planes_diarios_detalles')->insert([
																[
																				'plan_diario_id' => 1,
																				'fecha' => '2021-10-' . $i,
																				'contenido_desarrollado' => $lorem[$random_number],
																				'observacion' => $lorem[$random_number],
																				'created_at' => now(),
																				'updated_at' => now(),
																]
												]);
								}
    }
}
