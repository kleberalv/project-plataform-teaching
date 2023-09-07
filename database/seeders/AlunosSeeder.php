<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alunos;
use Faker\Factory as Faker;

class AlunosSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Alunos::create([
                'nome' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'data_nascimento' => $faker->date($format = 'Y-m-d', $max = '1999-01-01', $min = '1990-01-01'),
            ]);
        }
    }
}
