<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursos;

class CursosController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
        ]);

        $curso = new Cursos;
        $curso->titulo = $request->input('titulo');
        $curso->descricao = $request->input('descricao');
        $curso->save();

        return $this->index();
    }

    public function index()
    {
        $cursos = Cursos::whereNull('deleted_at')->paginate(10);

        return view('cursos', compact('cursos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
        ]);

        $curso = Cursos::findOrFail($id);

        $curso->titulo = $request->input('titulo');
        $curso->descricao = $request->input('descricao');

        $curso->save();

        return redirect()->route('cursos.index')->with('success', 'Curso atualizado com sucesso');
    }

    public function destroy($id)
    {
        $curso = Cursos::findOrFail($id);

        $curso->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso excluído com sucesso.');
    }
}
