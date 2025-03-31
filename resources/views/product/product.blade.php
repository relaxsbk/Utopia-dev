@extends('layouts.main')
@section('title', 'NAME')

@section('style')
    <style>
        .preview-img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }
        .preview-img:hover {
            transform: scale(1.05);
        }

        .main-image {
            border: 4px solid white;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }

        .product-price {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 18px;
        }

        .old-price {
            text-decoration: line-through;
            color: #888;
            font-size: 18px;
        }

        .new-price {
            color: #789dbc; /* зелёный, можно заменить */
            font-size: 24px;
            font-weight: bold;
        }
        .product-price {
            opacity: 0;
            transform: translateY(10px);
            animation: fadeInUp 0.5s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .product-title {
            font-weight: 600;
            font-size: 1.8rem;
        }

        .product-description p {
            font-size: 1rem;
            line-height: 1.6;
            color: #444;
        }

        .img-thumbnail {
            border-radius: 12px;
            cursor: pointer;
            transition: 0.3s;
        }
        .img-thumbnail:hover {
            transform: scale(1.05);
        }
        .button {
            transition: all 0.3s ease;
            transform: scale(1);
            border: none;
            border-radius: 5px;
            padding: 12px 24px;
            background-color: #789dbc81;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .button:hover {
            background-color: #FEF9F2;
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border: none;
        }

        .button:active {
            transform: scale(0.97);
            box-shadow: none;
        }
    </style>
@endsection

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
                    <span class="old-price">2 500₽</span>
                    <span class="new-price">1 900₽</span>
                </div>

                <div class="d-flex align-items-center mb-3">
                    <label for="quantity" class="me-2">Количество:</label>
                    <span class="text-muted ms-3">10 в наличии</span>
                </div>

                <div class="buttons mb-4">
                    <button class="button">В КОРЗИНУ</button>
                </div>

                <div class="product-description mb-4">
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
