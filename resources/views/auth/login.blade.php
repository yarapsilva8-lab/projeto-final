@extends('adminlte::auth.auth-page', ['authType' => 'login'])

@section('auth_header')
    <div class="text-center mb-3">
        <span style="font-size: 3rem;">🐾</span>
        <h1 style="font-family: 'Fredoka One', cursive; color: #2E7D32; font-size: 2rem; margin: 0;">
            Mundo Pet
        </h1>
        <p style="color: #757575; font-size: 0.9rem;">Faça login para continuar</p>
    </div>
@endsection

@section('auth_body')
    <form action="{{ route('login') }}" method="post">
        @csrf

        <div class="input-group mb-3">
            <input type="email" name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}"
                   placeholder="Email"
                   autofocus>
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
            </div>
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="password" name="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="Senha">
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-lock"></span></div>
            </div>
            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="row mb-3">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Lembrar-me</label>
                </div>
            </div>
            <div class="col-4">
                <button type="submit"
                        class="btn btn-block"
                        style="background: #2E7D32; color: #fff; border-radius: 20px; font-weight: 700;">
                    Entrar
                </button>
            </div>
        </div>
    </form>
@endsection

@section('auth_footer')
    <p class="mb-1">
        <a href="{{ route('password.request') }}" style="color: #2E7D32;">Esqueci minha senha</a>
    </p>
    <p class="mb-0">
        <a href="{{ route('register') }}" style="color: #FF6F00;">Criar conta</a>
    </p>
@endsection
