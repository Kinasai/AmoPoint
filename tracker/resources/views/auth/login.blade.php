{{-- resources/views/auth/login.blade.php --}}
@extends('auth.layout')

@section('title', 'Вход')

@section('content')

    <h2 class="text-center mb-4">Вход</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        <div class="mb-3">
            <label class="form-label">Email</label>

            <input
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}"
                required
            >

            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        {{-- Password --}}
        <div class="mb-3">
            <label class="form-label">Пароль</label>

            <input
                type="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                required
            >

            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        {{-- Remember --}}
        <div class="form-check mb-3">
            <input
                class="form-check-input"
                type="checkbox"
                name="remember"
                id="remember"
            >

            <label class="form-check-label" for="remember">
                Запомнить меня
            </label>
        </div>

        <button type="submit" class="btn btn-primary w-100 btn-auth">
            Войти
        </button>

        <div class="text-center mt-3">
            <a href="{{ route('register') }}">
                Нет аккаунта? Регистрация
            </a>
        </div>
    </form>

@endsection
