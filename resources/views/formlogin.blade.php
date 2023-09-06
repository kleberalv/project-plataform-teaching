@include('include.header')

@auth
{{-- Usuário já autenticado, redirecione para a área de admin --}}
<script>
    window.location = "{{ route('admin') }}";
</script>
@endauth

<div class="container d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <div class="card col-md-4" style="background-color: white;">
        <div class="card-body text-center">
            <h2>Login</h2>
            <form id="login" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3 text-start">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3 form-check text-start">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>