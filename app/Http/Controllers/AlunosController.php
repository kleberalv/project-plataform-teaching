<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alunos;
use App\Models\Matricula;

class AlunosController extends Controller
{

    public function store(Request $request)
    {
        try {
            $rules = [
                'nome' => 'required|string|max:100',
                'email' => 'required|email|string|max:100',
                'data_nascimento' => 'required|date',
            ];
            $customMessages = [
                '*' => [
                    'required' => 'O campo :attribute é obrigatório',
                    'max' => 'O campo :attribute deve conter no máximo :max caracteres',
                ],
            ];
            $this->validate($request, $rules, $customMessages);
            $alunos = new Alunos;
            $alunos->nome = $request->input('nome');
            $alunos->email = $request->input('email');
            $alunos->data_nascimento = $request->input('data_nascimento');
            $alunos->save();
            return redirect()->route('alunos.index')->with('success', 'Aluno criado com sucesso');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function index(Request $request)
    {
        try {
            $search = $request->input('search');
            $alunos = Alunos::whereNull('deleted_at')
                ->when($search, function ($query) use ($search) {
                    return $query->where('nome', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%");
                })
                ->paginate(10);

            return view('alunos', compact('alunos'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $rules = [
                'nome' => 'required|string|max:100',
                'email' => 'required|email|string|max:100',
                'data_nascimento' => 'required|date',
            ];
            $customMessages = [
                '*' => [
                    'required' => 'O campo :attribute é obrigatório',
                    'max' => 'O campo :attribute deve conter no máximo :max caracteres',
                ],
            ];
            $this->validate($request, $rules, $customMessages);
            $alunos = Alunos::findOrFail($request->aluno_id);
            $alunos->nome = $request->input('nome');
            $alunos->email = $request->input('email');
            $alunos->data_nascimento = $request->input('data_nascimento');
            $alunos->save();
            return redirect()->route('alunos.index')->with('success', 'Aluno atualizado com sucesso');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $aluno = Alunos::findOrFail($id);
            $matriculas = Matricula::where('aluno_id', $aluno->id)->get();
            foreach ($matriculas as $matricula) {
                $matricula->delete();
            }
            $aluno->delete();
            return redirect()->route('alunos.index')->with('success', 'Aluno e matriculas excluídos com sucesso.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
