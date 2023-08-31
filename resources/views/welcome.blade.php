@include('include.header')

<div class="container d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="card" style="background-color: white;">
        <div class="card-body text-center">
            <h1>Bem-vindo à Plataforma de Ensino Online</h1>
            <p>Conectando alunos e cursos de maneira eficiente.</p>
            <a class="btn btn-primary" href="{{ route('login') }}">Acessar</a>
        </div>
    </div>
</div>