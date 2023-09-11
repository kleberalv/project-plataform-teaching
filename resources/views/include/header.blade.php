<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/webfont.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

    <link rel="icon" type="image/png" href="/favicon.png">
    <title>Plataforma de Estudos</title>

</head>

<body>
    <div id="overlay" class="overlay"></div>
    <div id="loader" class="loader"></div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a id="home" class="navbar-brand" href="{{ auth()->check() ? route('admin') : env('APP_URL') }}">Plataforma de Estudos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @guest
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ auth()->check() ? route('admin') : env('APP_URL') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li> -->
                </ul>


                <!-- <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                </ul> -->

                @else

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a id="cursos" class="nav-link active" aria-current="page" href="{{route('cursos.index')}}">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a id="matriculas" class="nav-link active" aria-current="page" href="{{route('matriculas.index')}}">Matriculas</a>
                    </li>
                    <li class="nav-item">
                        <a id="alunos" class="nav-link active" aria-current="page" href="{{route('alunos.index')}}">Alunos</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a id="logout" class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>

                @endguest
            </div>
        </div>
    </nav>

    <div class="position-fixed top-5 end-0 p-3" style="z-index: 999">
        <div id="toast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Aviso</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Fechar"></button>
            </div>
            <div class="toast-body">
            </div>
        </div>
    </div>

    @if(session('success'))
    <script>
        $(document).ready(function() {
            $('#toast .toast-body').html("{{ session('success') }}");
            $('#toast').addClass('bg-light');
            var toast = new bootstrap.Toast($('#toast'));
            toast.show();
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        $(document).ready(function() {
            $('#toast .toast-body').html("{{ session('error') }}");
            $('#toast').addClass('bg-warning');
            var toast = new bootstrap.Toast($('#toast'));
            toast.show();
        });
    </script>
    @endif

    <script>
        $(document).ready(function() {
            $('#login, #salvarAdicao, #salvarEdicao, #excluir, #search').submit(function() {
                $('#overlay').show();
                $('#loader').show();
            });
            $('#home, #cursos, #matriculas, #alunos, #logout').click(function() {
                $('#overlay').show();
                $('#loader').show();
            });
        });
    </script>