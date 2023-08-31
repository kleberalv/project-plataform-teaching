<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Alunos;

class AlunosSeeder extends Seeder
{
    public function run()
    {
        Alunos::create([
            'nome' => 'João Silva',
            'email' => 'joao@example.com',
            'data_nascimento' => '1995-08-15',
        ]);

        Alunos::create([
            'nome' => 'Maria Souza',
            'email' => 'maria@example.com',
            'data_nascimento' => '1998-04-10',
        ]);

    }
}

