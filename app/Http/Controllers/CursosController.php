<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursos;

class CursosController extends Controller
{
    public function index()
    {
        $cursos = Cursos::whereNull('deleted_at')->paginate(10);

        return view('cursos', compact('cursos'));
    }
}
