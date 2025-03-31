@extends('layouts.main')
@section('title', 'Авторизация')

@section('main')
    <!-- Хлебные крошки -->
    <div class="container mb-4 mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">Главная</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Авторизация
                </li>

            </ol>
        </nav>
    </div>
<section class="d-flex justify-content-center items-center">
    <div class="login-wrapper ">

        <!-- Левая колонка -->
        <div class="login-left">
            <h2>ToyUtopia</h2>

            <form>
                <input type="email" name="email" placeholder="Электронная почта" required />
                <input type="password" name="password" placeholder="Пароль" required />
                <div class="checkbox-container">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Запомнить меня</label>
                </div>
                <button type="submit">Войти</button>
                <small>У вас нет аккаунта? <a href="{{route('register')}}">Зарегистрироваться</a></small>
            </form>
        </div>

        <!-- Правая колонка -->
        <div class="login-right">
            <img src="{{asset('storage/static/photo/мальчик1_1.png')}}" alt="Мальчик с игрушкой">
        </div>
    </div>
</section>

@endsection
