<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursos;

class CursosController extends Controller
{
    public function store(Request $request)
    {
        // Valide os dados do formulário
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
        ]);

        // Crie um novo curso com base nos dados do formulário
        $curso = new Cursos;
        $curso->titulo = $request->input('titulo');
        $curso->descricao = $request->input('descricao');
        $curso->save();

        // Redirecione para a página de cursos ou faça outra ação desejada
        return redirect()->route('admin.cursos');
    }

    public function index()
    {
        $cursos = Cursos::whereNull('deleted_at')->paginate(10);

        return view('cursos', compact('cursos'));
    }

    public function edit($id)
    {
        // Encontre o curso que você deseja editar pelo ID
        $curso = Cursos::findOrFail($id);

        // Retorne a view de edição com o curso
        return view('cursos.edit', compact('curso'));
    }
}
