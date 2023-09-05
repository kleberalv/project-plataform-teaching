<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Cursos;

class Alunos extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function cursos()
    {
        return $this->belongsToMany(Cursos::class, 'matriculas', 'aluno_id', 'curso_id');
    }
}
