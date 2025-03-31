@extends('layouts.main')
@section('title', 'Список NAME')

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
