<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matricula;
use App\Models\Alunos;
use App\Models\Cursos;

class MatriculaController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'curso_id' => 'required|exists:cursos,id',
            'data_matricula' => 'required|date',
        ]);

        $matricula = new Matricula;

        $matricula->aluno_id = $request->aluno_id;
        $matricula->curso_id = $request->curso_id;
        $matricula->data_matricula = $request->data_matricula;
        $matricula->save();

        return redirect()->route('matriculas.index')->with('success', 'Matrícula criada com sucesso.');
    }

    public function index()
    {
        $matriculas = Matricula::with(['alunos:id,nome', 'cursos:id,titulo'])->paginate(10);
        $alunos = Alunos::whereNull('deleted_at')->get();
        $cursos = Cursos::whereNull('deleted_at')->get();

        return view('matriculas', compact('matriculas', 'alunos', 'cursos'));
    }

    public function update(Request $request, Matricula $matricula)
    {
        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'curso_id' => 'required|exists:cursos,id',
            'data_matricula' => 'required|date',
        ]);

        $matricula->aluno_id = $request->input('aluno_id');
        $matricula->curso_id = $request->input('curso_id');
        $matricula->data_matricula = $request->input('data_matricula');
        $matricula->save();

        return redirect()->route('matriculas.index')->with('success', 'Matrícula atualizada com sucesso.');
    }

    public function destroy(Matricula $matricula)
    {
        $matricula->delete();
        return redirect()->route('matriculas.index')->with('success', 'Matrícula excluída com sucesso.');
    }
}
