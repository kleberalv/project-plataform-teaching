<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alunos;

class AlunosController extends Controller
{
    public function index()
    {
        $alunos = Alunos::whereNull('deleted_at')->paginate(10);

        return view('alunos', compact('alunos'));
    }
}
