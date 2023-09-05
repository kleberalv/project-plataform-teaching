<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alunos;
use App\Models\Matricula;

class AlunosController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'data_nascimento' => 'required|date',
        ]);

        $alunos = new Alunos;
        $alunos->nome = $request->input('nome');
        $alunos->email = $request->input('email');
        $alunos->data_nascimento = $request->input('data_nascimento');
        $alunos->save();

        return $this->index();
    }

    public function index()
    {
        $alunos = Alunos::whereNull('deleted_at')->paginate(10);

        return view('alunos', compact('alunos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'data_nascimento' => 'required|date',
        ]);

        $alunos = Alunos::findOrFail($id);
        $alunos->nome = $request->input('nome');
        $alunos->email = $request->input('email');
        $alunos->data_nascimento = $request->input('data_nascimento');
        $alunos->save();

        return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso');
    }

    public function destroy($id)
    {
        $aluno = Alunos::findOrFail($id);
        $matriculas = Matricula::where('aluno_id', $aluno->id)->get();

        foreach ($matriculas as $matricula) {
            $matricula->delete();
        }

        $aluno->delete();

        return redirect()->route('alunos.index')->with('success', 'Aluno excluído com sucesso.');
    }
}
