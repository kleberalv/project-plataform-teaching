<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AreaDeCurso;

class AreaDeCursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AreaDeCurso::create([
            'titulo' => 'Biologia',
            'descricao' => 'Estudo da vida e dos organismos vivos.',
        ]);

        AreaDeCurso::create([
            'titulo' => 'Química',
            'descricao' => 'Ciência que estuda a matéria e suas transformações.',
        ]);

    }
}
