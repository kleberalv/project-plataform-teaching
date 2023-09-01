<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matricula;
use App\Models\Alunos;
use App\Models\Cursos;
use Faker\Factory as Faker;

class MatriculasSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $alunos = Alunos::pluck('id')->toArray();
        $Cursos = Cursos::pluck('id')->toArray();

        foreach (range(1, 20) as $index) {
            Matricula::create([
                'aluno_id' => $faker->randomElement($alunos),
                'curso_id' => $faker->randomElement($Cursos),
                'data_matricula' => $faker->date(),
            ]);
        }
    }
}
