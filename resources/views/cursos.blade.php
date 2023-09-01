@include('include.header')

<div class="container-fluid" style=" min-height: 80vh;">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-8">
            <div class="card bg-white mt-4">
                <div class="card-header">
                    <h1 class="text-center my-1">Cursos Disponíveis</h1>
                    <a href="#" class="btn btn-primary float-end">Adicionar Curso</a>
                </div>
                <div class="card-body">
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
                                    <button class="btn btn-primary">
                                        <i class="fa-solid fa-pencil"></i> Editar
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i> Excluir
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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