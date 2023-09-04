@include('include.header')

<div class="container-fluid" style=" min-height: 80vh;">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-md-8">
            <div class="card bg-white mt-4">
                <div class="card-header">
                    <h1 class="text-center my-1">Matriculas</h1>
                    <a href="#" class="btn btn-primary float-end">Adicionar</a>
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
                                    <button class="btn btn-primary">
                                        <i class="fa fa-pencil"></i> Editar
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Excluir
                                    </button>
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