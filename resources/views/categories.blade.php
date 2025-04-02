@extends('layouts.main')
@section('title', 'Категории')

@section('style')
    <style>
        .filter-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 40px 0;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 5px;
            background: linear-gradient(145deg, #c9e9d282, #789dbc7e);
            color: #333;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: all 0.3s ease, transform 0.2s ease;
            position: relative;
            overflow: hidden;
        }

        .filter-btn::before {
            content: "";
            position: absolute;
            top: 0; left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, #C9E9D2);
            transition: all 0.5s ease;
        }

        .filter-btn:hover::before {
            left: 100%;
        }

        .filter-btn:hover {
            background: linear-gradient(to bottom, #789dbc44, #789dbc32);
            transform: scale(1.04);
            color: #000000;
        }

        .filter-btn.active {
            background: linear-gradient(90deg,
            rgba(120, 157, 188, 0.6) 0%,
            rgba(255, 227, 227, 0.6) 38%,
            rgba(254, 249, 242, 0.6) 70.5%,
            rgba(201, 233, 210, 0.6) 100%);
            color: #000000;
        }

        .filter-btn.active:hover {
            color: #4B4A48;
            background: linear-gradient(145deg, #c9e9d274 , #789dbc83,  #f0f0f0d7);
        }

        .filter-btn.green {
            background: linear-gradient(90deg,
            rgba(120, 157, 188, 0.6) 0%,
            rgba(255, 227, 227, 0.6) 38%,
            rgba(254, 249, 242, 0.6) 70.5%,
            rgba(201, 233, 210, 0.6) 100%);
            color: #000000;
        }

        .filter-btn.green:hover {
            color: #4B4A48;
            background: linear-gradient(145deg, #c9e9d274 , #789dbc83,  #f0f0f0d7);
        }


        /* Стили для карточек каталога */
        .cards-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
            padding-top: 50px;
        }

        .cards-wrapper {
            display: grid;
            grid-template-columns: repeat(3, 250px);
            gap: 40px;
            justify-content: center;
            padding-top: 50px;
        }

        .custom-card {

            overflow: hidden;
            background-color: #ffffff4b;
            display: flex;
            flex-direction: column;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            border-radius: 70px;
            width: 200px;
            height: 320px;
            border-radius: 35px;
            overflow: hidden;
            position: relative;
            transition: transform 0.3s ease-in-out;

        }

        .custom-card:hover {
            transform: scale(1.03);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
        }

        .custom-card img {
            width: 100%;
            height: 320px;
            object-fit: cover;
            border-radius: 30px 30px 0 0;
        }

        .card-footer {
            background: linear-gradient(0deg, rgba(254, 249, 242, 0.923), rgba(254, 249, 242, 0.3)), linear-gradient(90deg, rgba(120, 157, 188, 0.6) 0%, rgba(255, 227, 227, 0.6) 38%, rgba(254, 249, 242, 0.6) 70.5%, rgba(227, 241, 226, 0.6) 100%);
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 15px;
            text-align: center;
            z-index: 2;
            transition: all 0.3s ease-in-out;
        }

    </style>
@endsection

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
                    {{$catalog->name}}
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

    <h2 class="text-center fs-3">{{$catalog->name}} </h2>

    <!-- Карточки -->
    <div class="cards-wrapper">
        @foreach($categories as $category)
            <a href="{{route('categoryWithProducts', $category)}}" class="card custom-card">
                <img src="{{asset('storage/static/photo/кар-каталог-1.webp')}}" alt="{{$category->name}}">
                <div class="card-footer">{{$category->name}}</div>
            </a>
        @endforeach
{{--        <div class="card custom-card">--}}
{{--            <img src="{{asset('storage/static/photo/кар-каталог-2.webp')}}" alt="Развивающие игрушки">--}}
{{--            <div class="card-footer">Развивающие игрушки</div>--}}
{{--        </div>--}}
{{--        <div class="card custom-card">--}}
{{--            <img src="{{asset('storage/static/photo/кар-каталог-3.webp')}}" alt="Музыкальные игрушки">--}}
{{--            <div class="card-footer">Музыкальные игрушки</div>--}}
{{--        </div>--}}
{{--        <div class="card custom-card">--}}
{{--            <img src="{{asset('storage/static/photo/кар-каталог-4.webp')}}" alt="Технические игрушки">--}}
{{--            <div class="card-footer">Технические игрушки</div>--}}
{{--        </div>--}}
{{--        <div class="card custom-card">--}}
{{--            <img src="{{asset('storage/static/photo/кар-каталог-5.webp')}}" alt="Подвижные игры">--}}
{{--            <div class="card-footer">Подвижные игры</div>--}}
{{--        </div>--}}
{{--        <div class="card custom-card">--}}
{{--            <img src="{{asset('storage/static/photo/кар-каталог-6.webp')}}" alt="Игровой набор">--}}
{{--            <div class="card-footer">Игровой набор</div>--}}
{{--        </div>--}}
    </div>
@endsection
