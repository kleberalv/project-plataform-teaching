<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matricula extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function alunos()
    {
        return $this->belongsTo(Alunos::class, 'aluno_id');
    }

    public function cursos()
    {
        return $this->belongsTo(Cursos::class, 'curso_id');
    }
}
