<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cursos;
use App\Models\Matricula;

class CursosController extends Controller
{
    public function store(Request $request)
    {
        try {
            $rules = [
                'titulo' => 'required|string|max:100',
                'descricao' => 'required|string|max:200',
            ];
            $customMessages = [
                '*' => [
                    'required' => 'O campo :attribute é obrigatório',
                    'max' => 'O campo :attribute deve conter no máximo :max caracteres',
                ],
            ];
            $this->validate($request, $rules, $customMessages);
            $curso = new Cursos;
            $curso->titulo = $request->input('titulo');
            $curso->descricao = $request->input('descricao');
            $curso->save();
            return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function index(Request $request)
    {
        try {
            $search = $request->input('search');
            $cursos = Cursos::whereNull('deleted_at')
                ->when($search, function ($query) use ($search) {
                    return $query->where('titulo', 'like', "%$search%");
                })
                ->paginate(10);

            return view('cursos', compact('cursos'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $rules = [
                'titulo' => 'required|string|max:100',
                'descricao' => 'required|string|max:200',
            ];
            $customMessages = [
                '*' => [
                    'required' => 'O campo :attribute é obrigatório',
                    'max' => 'O campo :attribute deve conter no máximo :max caracteres',
                ],
            ];
            $this->validate($request, $rules, $customMessages);
            $curso = Cursos::findOrFail($request->curso_id);
            $curso->titulo = $request->input('titulo');
            $curso->descricao = $request->input('descricao');
            $curso->save();
            return redirect()->route('cursos.index')->with('success', 'Curso atualizado com sucesso');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $curso = Cursos::findOrFail($id);
            $matriculas = Matricula::where('curso_id', $curso->id)->get();
            foreach ($matriculas as $matricula) {
                $matricula->delete();
            }
            $curso->delete();
            return redirect()->route('cursos.index')->with('success', 'Curso e suas matrículas foram excluídos com sucesso.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
