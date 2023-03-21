<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SedeSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(AreaSeeder::class);
        $this->call(AsignaturaSeeder::class);
        $this->call(BachilleratoSeeder::class);
        $this->call(RequisitoSeeder::class);
        $this->call(GradoSeeder::class);
        $this->call(TipoEvaluacionSeeder::class);

        $this->call(CiudadSeeder::class);
        $this->call(ClausulaSeeder::class);
        $this->call(CausaSeeder::class);

        $this->call(NacionalidadSeeder::class);
        $this->call(GuardianSeeder::class);
        $this->call(EstudianteSeeder::class);

        $this->call(MallaCurricularSeeder::class);
        $this->call(PlanCursoSeeder::class);
        $this->call(PlanAcademicoSeeder::class);
        $this->call(RequisitoInscripcionSeeder::class);
        $this->call(PlanEvaluacionSeeder::class);

        $this->call(PostulanteSeeder::class);
        $this->call(ContratoSeeder::class);
        $this->call(HorarioSeeder::class);
        $this->call(ReemplazanteSeeder::class);

								$this->call(InscripcionSeeder::class);
								$this->call(PlanDiarioSeeder::class);
								$this->call(AsistenciaSeeder::class);
    }
}
