@include('include.header')

<div class="container-fluid" style=" min-height: 80vh;">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-8">
            <div class="card bg-white mt-4">
                <div class="card-header">
                    <h1 class="text-center my-1">Cursos Disponíveis</h1>
                    <br>
                    <div class="d-flex justify-content-between align-items-center">
                        <form id="search" action="{{ route('cursos.index') }}" method="GET">
                            <div class="input-group" style="width: 300px;">
                                <input type="text" name="search" class="form-control" placeholder="Pesquisar" aria-label="Buscar" aria-describedby="button-addon2">
                                <button class="btn btn-secondary" type="submit">Buscar</button>
                            </div>
                        </form>
                        <div class="ml-auto">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adicionarCursoModal">
                                Adicionar Curso
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($cursos->isEmpty())
                    <p class="d-flex justify-content-center ">Nenhum curso encontrado</p>
                    <br>
                    @else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th style="width: 140px;">Nome do Curso</th>
                                <th>Descrição</th>
                                <th style="width: 200px;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cursos as $curso)
                            <tr>
                                <td>{{ $curso->id }}</td>
                                <td>{{ $curso->titulo }}</td>
                                <td>{{ $curso->descricao }}</td>
                                <td>
                                    <button class="btn btn-primary editar-curso" data-bs-toggle="modal" data-bs-target="#editarCursoModal" data-curso-id="{{ $curso->id }}" data-titulo="{{ $curso->titulo }}" data-descricao="{{ $curso->descricao }}">
                                        <i class="fa fa-pencil"></i> Editar
                                    </button>
                                    <form id="excluir" action="{{ route('cursos.destroy', ['curso' => $curso->id]) }}" method="POST" style="display: inline;">
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
                            @if ($cursos->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                            @else
                            <li class="page-item"><a class="page-link" href="{{ $cursos->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                            @endif

                            @foreach ($cursos->getUrlRange(1, $cursos->lastPage()) as $page => $url)
                            @if ($page == $cursos->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                            @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                            @endforeach

                            @if ($cursos->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $cursos->nextPageUrl() }}" rel="next">&raquo;</a></li>
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

<div class="modal fade" id="adicionarCursoModal" tabindex="-1" aria-labelledby="adicionarCursoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adicionarCursoModalLabel">Adicionar Curso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="salvarAdicao" action="{{ route('cursos.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Nome do Curso</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="4" required></textarea>
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

@if(isset($curso))
<div class="modal fade" id="editarCursoModal" tabindex="-1" aria-labelledby="editarCursoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarCursoModalLabel">Editar Curso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="salvarEdicao" action="{{ route('cursos.update', ['curso' => $curso->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="editar-curso_id" name="curso_id">
                    <div class="mb-3">
                        <label for="editar-titulo" class="form-label">Nome do Curso</label>
                        <input type="text" class="form-control" id="editar-titulo" name="titulo" required>
                    </div>
                    <div class="mb-3">
                        <label for="editar-descricao" class="form-label">Descrição</label>
                        <textarea class="form-control" id="editar-descricao" name="descricao" rows="4" required></textarea>
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
        $('.editar-curso').click(function() {
            var cursoId = $(this).data('curso-id');
            var titulo = $(this).data('titulo');
            var descricao = $(this).data('descricao');

            $('#editar-curso_id').val(cursoId);
            $('#editar-titulo').val(titulo);
            $('#editar-descricao').val(descricao);

            // Abra a modal de edição
            $('#editarCursoModal').modal('show');
        });
    });
</script>