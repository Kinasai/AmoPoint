{{-- resources/views/auth/register.blade.php --}}
@extends('auth.layout')

@section('title', 'Регистрация')

@section('content')

    <h2 class="text-center mb-4">Регистрация</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Name --}}
        <div class="mb-3">
            <label class="form-label">Имя</label>

            <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}"
                required
            >

            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

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

        {{-- Confirm Password --}}
        <div class="mb-3">
            <label class="form-label">Подтверждение пароля</label>

            <input
                type="password"
                name="password_confirmation"
                class="form-control"
                required
            >
        </div>

        <button type="submit" class="btn btn-success w-100 btn-auth">
            Зарегистрироваться
        </button>

        <div class="text-center mt-3">
            <a href="{{ route('login') }}">
                Уже есть аккаунт? Войти
            </a>
        </div>
    </form>

@endsection
