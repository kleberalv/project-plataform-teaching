<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursos;
use App\Models\Matricula;

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

        // Busque as matrículas associadas a este curso
        $matriculas = Matricula::where('curso_id', $curso->id)->get();

        // Exclua cada matrícula
        foreach ($matriculas as $matricula) {
            $matricula->delete();
        }

        // Agora você pode excluir o curso
        $curso->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso e suas matrículas foram excluídos com sucesso.');
    }
}
