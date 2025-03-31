@extends('layouts.main')
@section('title', 'NAME')

@section('main')
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
                    <a href="katalog.html">Мягкие игрушки</a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">
                    Игрушка
                </li>
            </ol>
        </nav>
    </div>


    <div class="container product-page mt-5">
        <div class="row">
            <!-- Левый столбец: 3 маленьких превью -->
            <div class="col-md-2 d-flex flex-column align-items-center justify-content-start gap-3">
                <img src="{{asset('storage/static/photo/мягкая-игрушка-2-1.png')}}" class="img-thumbnail preview-img" alt="Превью 1">
                <img src="{{asset('storage/static/photo/мягкая-игрушка-2-2.png')}}" class="img-thumbnail preview-img" alt="Превью 2">
                <img src="{{asset('storage/static/photo/мягкая-игрушка-2-3.png')}}" class="img-thumbnail preview-img" alt="Превью 3">
            </div>

            <!-- Большое изображение рядом -->
            <div class="col-md-4">
                <img src="{{asset('storage/static/photo/мягкая-игрушка-2.png')}}" class="img-fluid main-image rounded" alt="Главное изображение">
            </div>

            <!-- Правая часть с информацией -->
            <div class="col-md-6">
                <h2>Енотик</h2>
                <div class="product-price mb-3">
                    <span class="old-price1">2 500₽</span>
                    <span class="new-price1">1 900₽</span>
                </div>

                <div class="d-flex align-items-center mb-3">
                    <label for="quantity" class="me-2">Количество:</label>
                    <span class="text-muted ms-3">10 в наличии</span>
                </div>

                <div class="buttons mb-4">
                    <button class="button">В КОРЗИНУ</button>
                </div>

                <div class="product-description1 mb-4">
                    <h5 class="mb-2">Описание</h5>
                    <p>
                        Познакомьтесь с самым очаровательным жителем вашего дома — плюшевым енотом! Этот пушистик создан для объятий, уюта и хорошего настроения. Его мягкая шерстка, добрые глазки и забавные лапки моментально вызывают улыбку. Идеальный спутник для детей, стильный декор для спальни или оригинальный подарок для любимого человека. Он не шумит, не пакостит — только дарит тепло и уют.
                        Плюшевый енот — это не просто игрушка, а настоящий друг с характером!
                    </p>
                </div>
                <button class="button" onclick="goBack()">⟵ Вернуться назад</button>

                <script>
                    function goBack() {
                        window.history.back();
                    }
                </script>

            </div>
        </div>
    </div>
@endsection
