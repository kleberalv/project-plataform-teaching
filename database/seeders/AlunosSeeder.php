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

        Alunos::create([
            'nome' => 'Pedro Santos',
            'email' => 'pedro@example.com',
            'data_nascimento' => '1990-12-25',
        ]);

        Alunos::create([
            'nome' => 'Ana Oliveira',
            'email' => 'ana@example.com',
            'data_nascimento' => '1993-09-08',
        ]);

        Alunos::create([
            'nome' => 'Lucas Pereira',
            'email' => 'lucas@example.com',
            'data_nascimento' => '1996-03-17',
        ]);

        Alunos::create([
            'nome' => 'Camila Rodrigues',
            'email' => 'camila@example.com',
            'data_nascimento' => '1997-07-22',
        ]);

        Alunos::create([
            'nome' => 'Fernando Martins',
            'email' => 'fernando@example.com',
            'data_nascimento' => '1994-06-12',
        ]);

        Alunos::create([
            'nome' => 'Juliana Barbosa',
            'email' => 'juliana@example.com',
            'data_nascimento' => '1992-11-03',
        ]);

        Alunos::create([
            'nome' => 'Rafaela Silva',
            'email' => 'rafaela@example.com',
            'data_nascimento' => '1999-02-18',
        ]);

        Alunos::create([
            'nome' => 'Gustavo Oliveira',
            'email' => 'gustavo@example.com',
            'data_nascimento' => '1991-10-29',
        ]);

        Alunos::create([
            'nome' => 'Mariana Santos',
            'email' => 'mariana@example.com',
            'data_nascimento' => '1998-01-14',
        ]);

        Alunos::create([
            'nome' => 'Carlos Rodrigues',
            'email' => 'carlos@example.com',
            'data_nascimento' => '1997-04-05',
        ]);

        Alunos::create([
            'nome' => 'Renata Martins',
            'email' => 'renata@example.com',
            'data_nascimento' => '1996-07-30',
        ]);

        Alunos::create([
            'nome' => 'Diego Pereira',
            'email' => 'diego@example.com',
            'data_nascimento' => '1993-05-20',
        ]);

        Alunos::create([
            'nome' => 'Amanda Santos',
            'email' => 'amanda@example.com',
            'data_nascimento' => '1990-09-28',
        ]);
    }
}
