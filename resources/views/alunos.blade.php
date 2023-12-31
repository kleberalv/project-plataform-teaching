@include('include.header')

<div class="container-fluid" style="min-height: 80vh;">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-8">
            <div class="card bg-white mt-4">
                <div class="card-header">
                    <h1 class="text-center my-1">Lista de Alunos</h1>
                    <br>
                    <div class="d-flex justify-content-between align-items-center">
                        <form id="search" action="{{ route('alunos.index') }}" method="GET">
                            <div class="input-group" style="width: 300px;">
                                <input type="text" name="search" class="form-control" placeholder="Pesquisar" aria-label="Buscar" aria-describedby="button-addon2">
                                <button class="btn btn-secondary" type="submit">Buscar</button>
                            </div>
                        </form>
                        <div class="ml-auto">
                            <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#adicionarAlunoModal">
                                Adicionar Alunos
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($alunos->isEmpty())
                    <p class="d-flex justify-content-center ">Nenhum aluno encontrado</p>
                    <br>
                    @else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome completo</th>
                                <th>E-mail</th>
                                <th>Data de nascimento</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alunos as $aluno)
                            <tr>
                                <td>{{ $aluno->id }}</td>
                                <td>{{ $aluno->nome }}</td>
                                <td>{{ $aluno->email }}</td>
                                <td>{{ date('d/m/Y', strtotime($aluno->data_nascimento)) }}</td>
                                <td>
                                    <button class="btn btn-primary editar-aluno" data-bs-toggle="modal" data-bs-target="#editarAlunoModal" data-aluno-id="{{ $aluno->id }}" data-nome="{{ $aluno->nome }}" data-email="{{ $aluno->email }}" data-data-nascimento="{{ date('Y-m-d', strtotime($aluno->data_nascimento)) }}">
                                        <i class="fa fa-pencil"></i> Editar
                                    </button>
                                    <form id="excluir" action="{{ route('alunos.destroy', ['aluno' => $aluno->id]) }}" method="POST" style="display: inline;">
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
                    @endif
                    <div class="d-flex justify-content-center ">
                        <ul class="pagination">
                            @if ($alunos->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            @else
                            <li class="page-item"><a class="page-link" href="{{ $alunos->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                            @endif

                            @foreach ($alunos->getUrlRange(1, $alunos->lastPage()) as $page => $url)
                            @if ($page == $alunos->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                            @endforeach

                            @if ($alunos->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $alunos->nextPageUrl() }}" rel="next">&raquo;</a></li>
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

<div class="modal fade" id="adicionarAlunoModal" tabindex="-1" aria-labelledby="adicionarAlunoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adicionarAlunoModalLabel">Adicionar Aluno</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="salvarAdicao" action="{{ route('alunos.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome completo</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="data_nascimento" class="form-label">Data de nascimento</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
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

@if(isset($aluno))
<div class="modal fade" id="editarAlunoModal" tabindex="-1" aria-labelledby="editarAlunoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarAlunoModalLabel">Editar Aluno</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="salvarEdicao" action="{{ route('alunos.update', ['aluno' => $aluno->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="editar-aluno_id" name="aluno_id">
                    <div class="mb-3">
                        <label for="editar-nome" class="form-label">Nome completo</label>
                        <input type="text" class="form-control" id="editar-nome" name="nome">
                    </div>
                    <div class="mb-3">
                        <label for="editar-email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="editar-email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="editar-data_nascimento" class="form-label">Data de nascimento</label>
                        <input type="date" class="form-control" id="editar-data_nascimento" name="data_nascimento">
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
@endif

<script>
    $(document).ready(function() {
        $('.editar-aluno').click(function() {
            var alunoId = $(this).data('aluno-id');
            var nome = $(this).data('nome');
            var email = $(this).data('email');
            var dataNascimento = $(this).data('data-nascimento');

            $('#editar-aluno_id').val(alunoId);
            $('#editar-nome').val(nome);
            $('#editar-email').val(email);
            $('#editar-data_nascimento').val(dataNascimento);

            // Abra a modal de edição
            $('#editarAlunoModal').modal('show');
        });
    });
</script>