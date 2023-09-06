@include('include.header')

<div class="container-fluid" style=" min-height: 80vh;">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-8">
            <div class="card bg-white mt-4">
                <div class="card-header">
                    <h1 class="text-center my-1">Matriculas</h1>
                    <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#adicionarMatriculaModal">
                        Adicionar Matrícula
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome do aluno</th>
                                <th>Nome do curso</th>
                                <th>Data matrícula</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($matriculas as $matricula)
                            <tr>
                                <td>{{ $matricula->id }}</td>
                                <td>{{ $matricula->alunos->nome }}</td>
                                <td>{{ $matricula->cursos->titulo }}</td>
                                <td>{{ date('d/m/Y', strtotime($matricula->data_matricula)) }}</td>
                                <td>
                                    <button class="btn btn-primary editar-matricula" data-matricula-id="{{ $matricula->id }}" data-aluno-id="{{ $matricula->alunos->id }}" data-curso-id="{{ $matricula->cursos->id }}" data-data-matricula="{{ $matricula->data_matricula }}">
                                        <i class="fa fa-pencil"></i> Editar
                                    </button>
                                    <form id="excluir" action="{{ route('matriculas.destroy', ['matricula' => $matricula->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center ">
                        <ul class="pagination">
                            @if ($matriculas->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            @else
                            <li class="page-item"><a class="page-link" href="{{ $matriculas->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                            @endif

                            @foreach ($matriculas->getUrlRange(1, $matriculas->lastPage()) as $page => $url)
                            @if ($page == $matriculas->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                            @endforeach

                            @if ($matriculas->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $matriculas->nextPageUrl() }}" rel="next">&raquo;</a></li>
                            @else
                            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="adicionarMatriculaModal" tabindex="-1" aria-labelledby="adicionarMatriculaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adicionarMatriculaModalLabel">Adicionar Matrícula</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="salvarAdicao" action="{{ route('matriculas.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="aluno_id" class="form-label">Aluno</label>
                        <select class="form-select" id="aluno_id" name="aluno_id" required>
                            <option value="">Selecione uma opção</option>
                            @foreach($alunos as $aluno)
                            <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="curso_id" class="form-label">Curso</label>
                        <select class="form-select" id="curso_id" name="curso_id" required>
                            <option value="">Selecione uma opção</option>
                            @foreach($cursos as $curso)
                            <option value="{{ $curso->id }}">{{ $curso->titulo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="data_matricula" class="form-label">Data de Matrícula</label>
                        <input type="date" class="form-control" id="data_matricula" name="data_matricula" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editarMatriculaModal" tabindex="-1" aria-labelledby="editarMatriculaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarMatriculaModalLabel">Editar Matrícula</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="salvarEdicao" action="{{ route('matriculas.update', ['matricula' => $matricula->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editar-aluno_id" class="form-label">Aluno</label>
                        <select class="form-select" id="editar-aluno_id" name="aluno_id">
                            <option value="">Selecione uma opção</option>
                            @foreach($alunos as $aluno)
                            <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editar-curso_id" class="form-label">Curso</label>
                        <select class="form-select" id="editar-curso_id" name="curso_id">
                            <option value="">Selecione uma opção</option>
                            @foreach($cursos as $curso)
                            <option value="{{ $curso->id }}">{{ $curso->titulo }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editar-data_matricula" class="form-label">Data de Matrícula</label>
                        <input type="date" class="form-control" id="editar-data_matricula" name="data_matricula">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.editar-matricula').click(function() {
            var matriculaId = $(this).data('matricula-id');
            var alunoId = $(this).data('aluno-id');
            var cursoId = $(this).data('curso-id');
            var dataMatricula = $(this).data('data-matricula');

            // Preencha os campos da modal de edição com os dados obtidos do botão "Editar"
            $('#editar-aluno_id').val(alunoId);
            $('#editar-curso_id').val(cursoId);
            $('#editar-data_matricula').val(dataMatricula);

            // Abra a modal de edição
            $('#editarMatriculaModal').modal('show');
        });
    });
</script>