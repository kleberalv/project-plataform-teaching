<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matricula;

class MatriculaController extends Controller
{
    public function index()
    {
        $matriculas = Matricula::with(['alunos:id,nome', 'cursos:id,titulo'])->paginate(10);

        return view('matriculas', compact('matriculas'));
    }
}
