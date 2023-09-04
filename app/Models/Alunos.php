<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cursos;

class Alunos extends Model
{
    use HasFactory;

    public function cursos()
{
    return $this->belongsToMany(Cursos::class, 'matriculas', 'aluno_id', 'curso_id');
}
}
