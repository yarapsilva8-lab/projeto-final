
@extends('adminlte::auth.auth-page', ['authType' => 'register'])

@section('auth_header')
    <div class="text-center mb-3">
        <span style="font-size: 3rem;">🐾</span>
        <h1 style="font-family: 'Fredoka One', cursive; color: #2E7D32; font-size: 2rem; margin: 0;">
            Mundo Pet
        </h1>
        <p style="color: #757575; font-size: 0.9rem;">Crie sua conta</p>
    </div>
@endsection

@section('auth_body')
    <form action="{{ route('register') }}" method="post">
        @csrf

        <div class="input-group mb-3">
            <input type="text" name="name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}"
                   placeholder="Nome completo"
                   autofocus>
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-user"></span></div>
            </div>
            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="email" name="email"
                   class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}"
                   placeholder="Email">
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

        <div class="input-group mb-3">
            <input type="password" name="password_confirmation"
                   class="form-control"
                   placeholder="Confirmar senha">
            <div class="input-group-append">
                <div class="input-group-text"><span class="fas fa-lock"></span></div>
            </div>
        </div>

        <button type="submit"
                class="btn btn-block"
                style="background: #2E7D32; color: #fff; border-radius: 20px; font-weight: 700;">
            Cadastrar
        </button>
    </form>
@endsection

@section('auth_footer')
    <p class="mb-0">
        <a href="{{ route('login') }}" style="color: #2E7D32;">Já tenho conta</a>
    </p>
@endsection

