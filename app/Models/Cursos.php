<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Alunos;

class Cursos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'titulo', 'descricao'
    ];

    public function alunos()
    {
        return $this->belongsToMany(Alunos::class, 'matriculas', 'curso_id', 'aluno_id');
    }
}
