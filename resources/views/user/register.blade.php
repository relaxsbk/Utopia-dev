@extends('layouts.main')
@section('title', 'Регистрация')

@section('main')
    <!-- Хлебные крошки -->
    <div class="container mb-4 mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">Главная</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{route('catalog')}}">в</a>
                </li>

            </ol>
        </nav>
    </div>
    <section class="d-flex justify-content-center items-center">
        <div class="login-wrapper h-auto ">

            <!-- Левая колонка -->
            <div class="login-left">
                <h2>ToyUtopia</h2>

                <form>
                    <input type="text" name="firstName" placeholder="Имя" required />
                    <input type="text" name="lastName" placeholder="Фамилия" required />
                    <input type="email" name="email" placeholder="Электронная почта" required />
                    <input type="text" name="phone" placeholder="Номер телефона" required />
                    <input type="password" name="password" placeholder="Пароль" required />
                    <input type="password" name="password_confirm" placeholder="Подтверждение пароля" required />
                    <button type="submit">Войти</button>
                    <small>У вас уже есть аккаунт? <a href="{{route('login')}}">Авторизоваться</a></small>
                </form>
            </div>

            <!-- Правая колонка -->
            <div class="login-right">
                <img src="{{asset('storage/static/photo/мальчик1_1.png')}}" alt="Мальчик с игрушкой">
            </div>
        </div>
    </section>

@endsection
