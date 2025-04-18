@extends('layouts.main')
@section('title', $category->name . ' | '.' '.'ToyUtopia')

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
                <li class="breadcrumb-item"><a href="{{route('catalog.show', $category->catalog)}}">{{$category->catalog->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="row">

            <!-- Фильтр -->
            <div class="col-md-3 mb-4">
                <div class="filter-box">
                    <h5>Цена</h5>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <input type="number" class="form-control me-2" placeholder="от" min="0" style="width: 45%;" id="priceMin" value="299">
                        <input type="number" class="form-control" placeholder="до" max="14000" style="width: 45%;" id="priceMax" value="14000">
                    </div>
                    <hr>

                    <h5>Бренды</h5>
                    <div class="form-check">
                        <input class="form-check-input brand-checkbox" type="checkbox" value="Жирафики" id="brand1">
                        <label class="form-check-label" for="brand1">Жирафики</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input brand-checkbox" type="checkbox" value="Умка" id="brand2">
                        <label class="form-check-label" for="brand2">Умка</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input brand-checkbox" type="checkbox" value="Step Puzzle" id="brand3">
                        <label class="form-check-label" for="brand3">Step Puzzle</label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input brand-checkbox" type="checkbox" value="Весна" id="brand4">
                        <label class="form-check-label" for="brand4">Весна</label>
                    </div>

                    <h5>Наличие</h5>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="inStock">
                        <label class="form-check-label" for="inStock">Только в наличии</label>
                    </div>

                    <h5>Сортировать по</h5>
                    <select class="form-select mb-3" id="sortSelect">
                        <option value="">Без сортировки</option>
                        <option value="price_asc">Цене: по возрастанию</option>
                        <option value="price_desc">Цене: по убыванию</option>
                        <option value="name_asc">Названию: А → Я</option>
                        <option value="name_desc">Названию: Я → А</option>
                    </select>

                    <div class="d-grid gap-2">
                        <button class="product-button" id="filterBtn">Применить фильтр</button>
                        <button class="product-button" id="resetBtn" style="background: #e5e5e5;">Сбросить фильтры</button>
                    </div>
                </div>
            </div>


            <!-- Товары -->
            <div class="col-md-9">
                <div class="product-container">

                  @foreach($products as $product)
                        <!-- Карточки товаров -->
                        <x-product-card :product="$product"/>
                  @endforeach

                </div>
            </div>
        </div>

    </div>
@endsection
