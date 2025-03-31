@extends('layouts.main')
@section('title', 'Категории')

@section('main')
    <!-- Хлебные крошки -->
    <div class="container mb-4 mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">Главная</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="{{route('catalog')}}">Каталог</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="katalog.html">NAME</a>
                </li>

            </ol>
        </nav>
    </div>


    <!-- Кнопки фильтра -->
{{--    <div class="filter-buttons">--}}
{{--        <button class="filter-btn active"><- Ясель</button>--}}
{{--        <button class="filter-btn">Игрушки для детей: дошкольного возраста</button>--}}
{{--        <button class="filter-btn green">Школьники -></button>--}}
{{--    </div>--}}

    <h2 class="text-center fs-3">НАЗВАНИЕ КАТАЛОГА </h2>

    <!-- Карточки -->
    <div class="cards-wrapper">
        <a href="/" class="card custom-card">
            <img src="{{asset('storage/static/photo/кар-каталог-1.webp')}}" alt="Мягкие игрушки">
            <div class="card-footer">Мягкие игрушки</div>
        </a>
        <div class="card custom-card">
            <img src="{{asset('storage/static/photo/кар-каталог-2.webp')}}" alt="Развивающие игрушки">
            <div class="card-footer">Развивающие игрушки</div>
        </div>
        <div class="card custom-card">
            <img src="{{asset('storage/static/photo/кар-каталог-3.webp')}}" alt="Музыкальные игрушки">
            <div class="card-footer">Музыкальные игрушки</div>
        </div>
        <div class="card custom-card">
            <img src="{{asset('storage/static/photo/кар-каталог-4.webp')}}" alt="Технические игрушки">
            <div class="card-footer">Технические игрушки</div>
        </div>
        <div class="card custom-card">
            <img src="{{asset('storage/static/photo/кар-каталог-5.webp')}}" alt="Подвижные игры">
            <div class="card-footer">Подвижные игры</div>
        </div>
        <div class="card custom-card">
            <img src="{{asset('storage/static/photo/кар-каталог-6.webp')}}" alt="Игровой набор">
            <div class="card-footer">Игровой набор</div>
        </div>
    </div>
@endsection
