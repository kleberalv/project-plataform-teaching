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
        try {
            $rules = [
                'aluno_id' => 'required|exists:alunos,id',
                'curso_id' => 'required|exists:cursos,id',
                'data_matricula' => 'required|date',
            ];
            $customMessages = [
                '*' => [
                    'required' => 'O campo :attribute é obrigatório',
                ],
            ];
            $this->validate($request, $rules, $customMessages);
            $matriculaExistente = Matricula::where('aluno_id', $request->aluno_id)
                ->where('curso_id', $request->curso_id)
                ->first();
            if ($matriculaExistente) {
                return back()->with('error', 'Este aluno já está matriculado neste curso.');
            }
            $matricula = new Matricula;
            $matricula->aluno_id = $request->aluno_id;
            $matricula->curso_id = $request->curso_id;
            $matricula->data_matricula = $request->data_matricula;
            $matricula->save();
            return redirect()->route('matriculas.index')->with('success', 'Matrícula criada com sucesso.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function index()
    {
        try {
            $matriculas = Matricula::with(['alunos:id,nome', 'cursos:id,titulo'])->paginate(10);
            $alunos = Alunos::whereNull('deleted_at')->get();
            $cursos = Cursos::whereNull('deleted_at')->get();
            return view('matriculas', compact('matriculas', 'alunos', 'cursos'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $rules = [
                'aluno_id' => 'required|exists:alunos,id',
                'curso_id' => 'required|exists:cursos,id',
                'data_matricula' => 'required|date',
            ];
            $customMessages = [
                '*' => [
                    'required' => 'O campo :attribute é obrigatório',
                ],
            ];
            $this->validate($request, $rules, $customMessages);
            $matricula = Matricula::findOrFail($request->matricula_id);
            $matriculaExistente = Matricula::where('aluno_id', $request->input('aluno_id'))
                ->where('curso_id', $request->input('curso_id'))
                ->where('id', '!=', $matricula->id)
                ->first();
            if ($matriculaExistente) {
                return back()->with('error', 'Este aluno já está matriculado neste curso.');
            }
            $matricula->aluno_id = $request->input('aluno_id');
            $matricula->curso_id = $request->input('curso_id');
            $matricula->data_matricula = $request->input('data_matricula');
            $matricula->save();
            return redirect()->route('matriculas.index')->with('success', 'Matrícula atualizada com sucesso.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function destroy(Matricula $matricula)
    {
        try {
            $matricula->delete();
            return redirect()->route('matriculas.index')->with('success', 'Matrícula excluída com sucesso.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
