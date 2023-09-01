<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CursosSeeder;
use Database\Seeders\AlunosSeeder;
use Database\Seeders\MatriculasSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CursosSeeder::class);
        $this->call(AlunosSeeder::class);
        $this->call(MatriculasSeeder::class);
        $this->call(UserSeeder::class);
    }
}
