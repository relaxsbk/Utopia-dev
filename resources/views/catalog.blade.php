@extends('layouts.main')
@section('title', 'Каталог')

@section('style')
    <style>
        /* Стили для карточек каталога */

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
            width: 200px;
            height: 320px;
            border-radius: 35px;
            position: relative;

        }

        .custom-card:hover {
            transform: scale(1.03);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
        }

        .custom-card img {
            width: 100%;
            height: 320px;
            object-fit: cover;
        }

        /* Карточки товаров */
        .card {
            width: 100%; /* Растягивание на всю ширину колонки */
            max-width: 200px; /* Ограничение максимального размера */
            margin: 0 auto; /* Выравнивание по центру */
            overflow: hidden; /* Обрезка лишнего */
        }

        /* Изображение в карточке */
        .card-img-top {
            height: 250px; /* Фиксированная высота */
            object-fit: cover; /* Обрезка и сохранение пропорций */
        }


        /* Фиксированные размеры карточек */
        .custom-card {
            width: 200px;
            height: 320px;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            transition: transform 0.3s ease-in-out;
        }

        /* Изображение на всю карточку */
        .card-img-top {
            width: 100%;
            object-fit: cover;
            top: 0;
            left: 0;
            z-index: 1;
            transition: filter 0.3s ease-in-out;
        }

        /* Фон под текстом - прозрачный */
        .custom-body {
            position: absolute;
            bottom: 0;
            width: 100%;
            background: rgba(254, 249, 242, 0.7);
            padding: 15px;
            text-align: center;
            z-index: 2;
            transition: all 0.3s ease-in-out;
        }

        /* Заголовок и текст */
        .card-title {
            font-size: 16px;
            font-weight: bold;
            font-family: Arial, sans-serif;
            margin-bottom: 5px;
        }


        /* Эффект наведения */
        .custom-card:hover {
            transform: scale(1.05); /* Небольшое увеличение карточки */
        }

        .custom-card:hover .card-img-top {
            filter: brightness(40%); /* Затемнение картинки */
        }

        .custom-card:hover .custom-body {
            background: rgba(254, 249, 242, 0.6); /* Фон становится менее прозрачным */
            bottom: 50%; /* Перемещение текста по центру */
            transform: translateY(50%);
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
                    Каталог
                </li>

            </ol>
        </nav>
    </div>


    <h2 class="text-center fs-3">Каталог</h2>

    <!-- Карточки -->
    <div class="cards-wrapper">
        <a href="/" class="card custom-card">
{{--            <img src="{{asset('/storage/static/photo/лего-дом.png')}}" class="card-img-top" alt="Lego">--}}
            <img src="http://yao.goguynet.jp/wp-content/uploads/sites/17/2017/12/840945.jpg" class="card-img-top" alt="Lego">
            <div class="card-body custom-body">
                <h3 class="card-title text-black text-center text-wrap text-break">Ясель</h3>
            </div>
        </a>
        <a href="/" class="card custom-card">
{{--            <img src="{{asset('/storage/static/photo/лего-дом.png')}}" class="card-img-top" alt="Lego">--}}
            <img src="https://img.freepik.com/premium-vector/kids-playing-entertaining-moments-vector-illustration_1253202-216205.jpg?semt=ais_hybrid" class="card-img-top" alt="Lego">
            <div class="card-body custom-body">
                <h3 class="card-title text-black text-center text-wrap text-break">Дошкольники</h3>
            </div>
        </a>
        <a href="/" class="card custom-card">
{{--            <img src="{{asset('/storage/static/photo/лего-дом.png')}}" class="card-img-top" alt="Lego">--}}
            <img src="https://avatars.mds.yandex.net/i?id=01aa3790705b3d460ab0434314f57c0a_l-7552315-images-thumbs&n=13" class="card-img-top" alt="Lego">
            <div class="card-body custom-body">
                <h3 class="card-title text-black text-center text-wrap text-break">Школьники</h3>
            </div>
        </a>
    </div>
@endsection
