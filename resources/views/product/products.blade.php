@extends('layouts.main')
@section('title', 'Список NAME')

@section('style')
    <style>
        .filter-box {
            background: #ffffffd1;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }



        .card img {
            border-radius: 20px 20px 0 0;
        }



        .product-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .product-card {
            width: calc(25% - 15px);
            background: #ffffff35;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.232);
            transition: transform 0.3s ease;
            text-align: center;
            padding-bottom: 10px;
        }

        .product-card:hover {
            transform: scale(1.03);
        }

        .product-card img {
            width: 100%;
            height:200px;
            object-fit: contain;
            background-color: #f5f5f500;
        }

        .product-body {
            padding: 10px;
        }

        .product-title {
            font-size: 0.95rem;
            font-weight: 600;
            margin: 5px 0;
        }

        .product-category {
            font-size: 0.75rem;
            color: #789DBC;
        }

        .product-price {
            font-size: 0.85rem;
            font-weight: bold;
            color: #0a0c0b;
            margin: 6px 0;
        }

        .product-button {
            display: block;
            width: 80%;
            margin: 5px auto;
            padding: 5px;
            background: linear-gradient(90deg,
            rgba(120, 157, 188, 0.6) 0%,
            rgba(255, 227, 227, 0.6) 38%,
            rgba(254, 249, 242, 0.6) 70.5%,
            rgba(201, 233, 210, 0.6) 100%);
            color: #000000;
            font-size: 0.8rem;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
            text-align: center;
        }

        .product-button:hover {
            background: #789dbc96;
        }

        /* Адаптив для планшетов и телефонов */
        @media (max-width: 992px) {
            .product-card {
                width: calc(50% - 15px);
            }
        }

        @media (max-width: 576px) {
            .product-card {
                width: 100%;
            }
        }

    </style>
@endsection

@section('main')
    <div class="container py-3 mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{route('catalog')}}">Каталог</a></li>
                <li class="breadcrumb-item"><a href="{{route('catalog')}}">NAME</a></li>
                <li class="breadcrumb-item active" aria-current="page">Мягкие игрушки</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="row">

            <!-- Фильтр -->
            <div class="col-md-3 mb-4">
                <div class="filter-box">

                    <h5>Цена</h5>
                    <label for="priceRange" class="form-label">299₽ - 14 000₽</label>
                    <input type="range" class="form-range" id="priceRange" min="299" max="14000" step="1">
                    <hr>
                    <h5>Бренды</h5>
                    <select class="form-select">
                        <option>Все бренды</option>
                        <option>Жирафики</option>
                        <option>Умка</option>
                        <option>Step Puzzle</option>
                        <option>Весна</option>
                    </select>

                    <a class="product-button" id="filterBtn">Я фильтрую</a>
                </div>
            </div>


            <!-- Товары -->
            <div class="col-md-9">
                <div class="product-container">

                    <!-- Карточки товаров -->
                    <div class="product-card">
                        <img src="{{asset('storage/static/photo/мягкая-игрушка-1.png')}}" alt="Мягкие игрушки">
                        <div class="product-body">
                            <div class="product-title">Мяго-кот</div>
                            <div class="product-category">Мягкие игрушки</div>
                            <div class="product-price">1 200₽</div>
                            <a href="#" class="product-button">Перейти к товару</a>
                        </div>
                    </div>

                    <div class="product-card">
                        <img src="{{asset('storage/static/photo/мягкая-игрушка-2.png')}}" alt="Мягкие игрушки">
                        <div class="product-body">
                            <div class="product-title">Ёнотик</div>
                            <div class="product-category">Мягкие игрушки</div>
                            <div class="product-price">850₽</div>
                            <a href="kartohka-toy.html" class="product-button">Перейти к товару</a>
                        </div>
                    </div>

                    <div class="product-card">
                        <img src="{{asset('storage/static/photo/мягкая-игрушка-3.png')}}" alt="Мягкие игрушки">
                        <div class="product-body">
                            <div class="product-title">Грузовичок-лев</div>
                            <div class="product-category">Мягкие игрушки</div>
                            <div class="product-price">999₽</div>
                            <a href="#" class="product-button">Перейти к товару</a>
                        </div>
                    </div>

                    <div class="product-card">
                        <img src="{{asset('storage/static/photo/мягкая-игрушка-4.png')}}" alt="Мягкие игрушки">
                        <div class="product-body">
                            <div class="product-title">Лисичка</div>
                            <div class="product-category">Мягкие игрушки</div>
                            <div class="product-price">1 050₽</div>
                            <a href="#" class="product-button">Перейти к товару</a>
                        </div>
                    </div>

                    <div class="product-card">
                        <img src="{{asset('storage/static/photo/мягкая-игрушка-5.png')}}" alt="Мягкие игрушки">
                        <div class="product-body">
                            <div class="product-title">Зайчик</div>
                            <div class="product-category">Мягкие игрушки</div>
                            <div class="product-price">890₽</div>
                            <a href="#" class="product-button">Перейти к товару</a>
                        </div>
                    </div>

                    <div class="product-card">
                        <img src="{{asset('storage/static/photo/мягкая-игрушка-6.png')}}" alt="Мягкие игрушки">
                        <div class="product-body">
                            <div class="product-title">МАМА-акула</div>
                            <div class="product-category">Мягкие игрушки</div>
                            <div class="product-price">1 150₽</div>
                            <a href="#" class="product-button">Перейти к товару</a>
                        </div>
                    </div>

                    <div class="product-card">
                        <img src="{{asset('storage/static/photo/мягкая-игрушка-7.png')}}" alt="Мягкие игрушки">
                        <div class="product-body">
                            <div class="product-title">Гонна</div>
                            <div class="product-category">Мягкие игрушки</div>
                            <div class="product-price">1 300₽</div>
                            <a href="#" class="product-button">Перейти к товару</a>
                        </div>
                    </div>

                    <div class="product-card">
                        <img src="{{asset('storage/static/photo/мягкая-игрушка-8.png')}}" alt="Мягкие игрушки">
                        <div class="product-body">
                            <div class="product-title">Тоя-щенок</div>
                            <div class="product-category">Мягкие игрушки</div>
                            <div class="product-price">970₽</div>
                            <a href="#" class="product-button">Перейти к товару</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
