@extends('layouts.main')
@section('title', 'ToyUtopia')

@section('style')
    <style>

        /* Hero-секция ребёнок-банер */
        .hero {
            position: relative;
            width: 100%;
            text-align: center;
            padding-top: 100px; /* Отступ от шапки */
            padding-bottom: 50px; /* Отступ после секции */
        }

        /* Фото (баннер) */
        .hero-image {
            max-width: 80%; /* Ограничиваем ширину */
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            position: relative;
        }


        /* Кнопка сбоку на баннере */
        .custom-btn {
            position: absolute;
            left: 65%; /* Расположение кнопки слева (можно заменить на right) */
            top: 72%; /* По центру баннера */
            transform: translateY(-50%); /* Выравниваем по центру */
            background: linear-gradient(90deg, rgba(120, 157, 188, 0.6) 0%, rgba(255, 227, 227, 0.6) 96.88%);
            border-radius: 20px;
            font-family: Arial, sans-serif;
            color: #363434d4; /* Черный текст */
            font-family: 'Poppins', sans-serif;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }

        /* Эффект при наведении */
        .custom-btn:hover {
            background: rgba(254, 249, 242, 0.6);
            color:  #363434d4;
        }

        /* Контейнер с текстом */
        .hero .container {
            position: relative;
            z-index: 2; /* Поднимаем текст и кнопку поверх */
        }
        /* Фон секции с градиентом и эффектом blur */
        .brand-section {
            background: linear-gradient(90deg,
            rgba(120, 157, 188, 0.6) 0%,
            rgba(255, 227, 227, 0.6) 38%,
            rgba(254, 249, 242, 0.6) 70.5%,
            rgba(201, 233, 210, 0.6) 100%);
            backdrop-filter: blur(10px);
            padding: 60px 0;
        }

        /* Белая центральная полоса с логотипами */
        .brand-wrapper {
            background: #fff;
            border-radius: 20px;
            padding: 20px;
        }

        /* Стили для логотипов */
        .brand-logo {
            max-height: 60px;
            object-fit: contain;
        }

        /* Адаптивность для мобильных */
        @media (max-width: 768px) {
            .brand-logo {
                max-height: 50px;
            }
        }
        /* карточка брендов */
        .brand-section {
            position: relative;
            padding: 10px 0; /* Уменьшаем отступ сверху и снизу */
            max-height: 120px; /* Ограничиваем высоту */
        }

        .brand-wrapper {
            position: relative;
            background: transparent;
            padding: 10px; /* Уменьшаем внутренний отступ */
            border-radius: 15px;
            overflow: hidden;
            max-height: 100px; /* Ограничиваем высоту */
        }

        .brand-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 80px; /* Уменьшаем высоту градиентного фона */
            background: radial-gradient(50% 659.39% at 50% 50%, #fef9f2dc 2.88%, #e3f1e2bc 98.32%);
            background: rgba(254, 249, 242, 0.6);
            border-radius: 10px;
            z-index: 1;
        }


        .brand-logos {
            position: relative;
            z-index: 3;
            padding: 5px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            max-height: 80px; /* Уменьшаем размер логотипного контейнера */
        }

        .brand-logo {
            max-width: 100px; /* Делаем логотипы чуть меньше */
            height: auto;
            margin: 5px;
            filter: drop-shadow(0px 0px 5px rgba(0, 0, 0, 0.2));
            transition: transform 0.3s ease-in-out;
        }

        .brand-logo:hover {
            transform: scale(1.1);
        }


        /* Карточки товаров */
        .card {
            width: 100%; /* Растягивание на всю ширину колонки */
            max-width: 200px; /* Ограничение максимального размера */
            margin: 0 auto; /* Выравнивание по центру */
            border-radius: 10px; /* Скругление углов */
            overflow: hidden; /* Обрезка лишнего */
        }

        /* Изображение в карточке */
        .card-img-top {
            height: 250px; /* Фиксированная высота */
            object-fit: cover; /* Обрезка и сохранение пропорций */
        }

        /* Контейнер с карточками */
        .row.text-center {
            justify-content: center; /* Выравнивание по центру */
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
            background: rgba(254, 249, 242, 0.3);
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

        .card-text {
            font-size: 14px;
            font-family: Arial, sans-serif;
            color: #333;
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

        /* Инфа банер */

        .custom-banner {
            padding: 50px 0;
            position: relative;
        }

        .banner-image {
            width: 100%;
            border-radius: 10px;

        }

        .banner-text {
            background: #FFE3E3; /* Полупрозрачный фон */
            padding: 20px;
            border-radius: 20px;
            backdrop-filter: blur(10px); /* Эффект стекла */
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .banner-text h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .banner-text p {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .banner-text .btn {
            display: block;
            width: fit-content;
            margin-top: 10px;
            padding: 10px 20px;
            border-radius: 5px;
            background: linear-gradient(90deg, rgba(120, 157, 188, 0.6) 0%,#FEF9F2);
            border-radius: 20px;
            font-family: Arial, sans-serif;
            color: #363434d4; /* Черный текст */
            font-family: 'Poppins', sans-serif;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }

        /* Эффект при наведении */
        .banner-text .btn:hover {
            background: #FFE3E3; /* Розовый цвет при наведении */
            color: #363434d4;
        }

        /* Футер */
        .footer {
            background: rgba(254, 249, 242, 0.3);
            backdrop-filter: blur(10px);
        }


        /* Контейнер для текста  скидки*/
        /* Общие стили */
        .carousel-item img {
            max-height: 400px;
            object-fit: cover;
        }
        .carousel-caption {
            background: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            padding: 10px;
        }



        /* Общий стиль карусели */
        .carousel-item {
            position: relative;
        }

        /* Стили для изображений */
        .carousel-item img {
            width: 75%; /* Чуть уменьшаем фото */
            height: 280px; /* Чуть уменьшаем фото */
            object-fit: contain;
            border-radius: 10px;
            display: block;
            margin: 0 auto;
            transition: filter 0.3s ease-in-out;
        }

        /* Подпись (текст) под изображением */
        .carousel-caption {
            background: none; /* Убираем серый фон */
            color: #363434d4; /* Темный текст */
            padding: 10px;
            font-size: 16px;
            position: relative; /* Теперь текст будет под фото */
            bottom: -20px; /* Опускаем текст под изображение */
            left: 0;
            width: 100%;
            text-align: center;
            transition: opacity 0.3s ease-in-out;
        }

        /* При наведении на изображение текст исчезает */
        .carousel-item:hover .carousel-caption {
            opacity: 0;
        }

        /* При наведении изображение становится немного темнее */
        .carousel-item:hover img {
            filter: brightness(0.8);
        }

        /* Адаптивность для мобильных устройств */
        @media (max-width: 768px) {
            .carousel-item img {
                width: 85%;
                height: 200px;
            }
            .carousel-caption {
                font-size: 14px;
                padding: 5px;
            }
        }
        .carousel-control-prev,
        .carousel-control-next {
            width: 50px;
            height: 50px;
            background-color: #789DBC; /* Оранжевый цвет с прозрачностью */
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease-in-out;
        }

        .carousel-control-prev:hover,
        .carousel-control-next:hover {
            background-color:#789DBC; /* Более насыщенный цвет при наведении */
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(100%);
            width: 20px;
            height: 20px;
        }


        /* приложение */
        /* Новый фон секции с градиентом */
        .gradient-section {
            background: linear-gradient(0deg, rgba(254, 249, 242, 0.3), rgba(254, 249, 242, 0.3)),
            linear-gradient(90deg, rgba(120, 157, 188, 0.6) 0%, rgba(255, 227, 227, 0.6) 38%, rgba(254, 249, 242, 0.6) 70.5%, rgba(201, 233, 210, 0.6) 100%);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 20px;
            box-shadow: none;
        }

        /* Контейнер изображения с кнопкой */
        .image-wrapper {
            position: relative;
            display: flex;
            justify-content: center; /* Центрируем содержимое */
            align-items: center;
            width: 100%;
            max-width: 600px; /* Ограничиваем ширину */
            margin: 0 auto;
        }

        /* Изображение */
        .image-wrapper img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 15px;
        }

        /* Кнопка строго по центру */
        .overlay-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 12px 24px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 12px;
            background: rgba(255, 227, 227, 1); /* Розовый фон */
            color: #363434;
            text-decoration: none;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            transition: background 0.3s ease, color 0.3s ease;
        }

        /* Эффект при наведении */
        .overlay-button:hover {
            background: linear-gradient(0deg, rgba(254, 249, 242, 0.3), rgba(254, 249, 242, 0.3)),
            linear-gradient(90deg, rgba(120, 157, 188, 0.6) 0%, rgba(255, 227, 227, 0.6) 38%, rgba(254, 249, 242, 0.6) 70.5%, rgba(201, 233, 210, 0.6) 100%);
            color: #363434;
        }

        /* Градиентный футер с эффектом размытия */
        .blurred-footer {
            background: linear-gradient(0deg, rgba(254, 249, 242, 0.3), rgba(254, 249, 242, 0.3)),
            linear-gradient(90deg, rgba(120, 157, 188, 0.6) 0%, rgba(255, 227, 227, 0.6) 38%, rgba(254, 249, 242, 0.6) 70.5%, rgba(201, 233, 210, 0.6) 100%);
            backdrop-filter: blur(10px);
            padding: 10px 0;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            color: #363434;
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
    <header class="hero text-white d-flex flex-column align-items-center justify-content-center">
        <div class="container position-relative">
            <img src="{{asset('/storage/static/photo/вверх.png')}}" alt="Banner" class="hero-image"> <!-- Фоновое фото -->
            <a href="{{route('catalog')}}" class="btn custom-btn btn-outline-secondary ">Перейти в каталог</a>
        </div>
    </header>

    <div class=".custom-navbar">

    </div>

    <!-- карточка брендов -->
    <!-- СЕКЦИЯ БРЕНДОВ -->
    <section class="brand-section my-5">
        <div class="container">
            <div class="brand-wrapper rounded-4 shadow">
                <div class="brand-logos d-flex justify-content-around align-items-center flex-wrap gap-4">
                    <img src="{{asset('/storage/static/photo/лого весна.png')}}" alt="Весна" class="brand-logo" />
                    <img src="{{asset('/storage/static/photo/лого степ.png')}}" alt="Step Puzzle" class="brand-logo" />
                    <img src="{{asset('/storage/static/photo/лого норпалис.png/')}}" alt="Нордпласт" class="brand-logo" />
                    <img src="{{asset('/storage/static/photo/лого умка.png')}}" alt="Умка" class="brand-logo" />
                    <img src="{{asset('/storage/static/photo/лого жирафики.png')}}" alt="Жирафики" class="brand-logo" />
                    <img src="{{asset('/storage/static/photo/лого lori.png')}}" alt="LORI" class="brand-logo" />
                </div>
            </div>
        </div>
    </section>



    <!-- Категории товаров -->
    <section class="container my-5">
        <h2 class="text-center mb-4"> 📌 Популярные категории 📌</h2>
        <div class="row text-center justify-content-center">
            <div class="col-md-4 col-lg-2">
                <a href="/" class="card custom-card">
                    <img src="{{asset('/storage/static/photo/лего-дом.png')}}" class="card-img-top" alt="Lego">
                    <div class="card-body custom-body">
                        <h3 class="card-title text-black text-center text-wrap text-break">LEGO Конструкторы</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="card custom-card">
                    <img src="{{asset('/storage/static/photo/робот-машина.png')}}" class="card-img-top" alt="Роботы">
                    <div class="card-body custom-body">
                        <h3 class="card-title">Интерактивные игрушки</h3>
{{--                        <p class="card-text">Интерактивные игрушки</p>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="card custom-card">
                    <img src="{{asset('/storage/static/photo/барби (2).png')}}" class="card-img-top" alt="Барби">
                    <div class="card-body custom-body">
                        <h3 class="card-title">Любимые куклы</h3>
{{--                        <p class="card-text">Любимые куклы</p>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="card custom-card">
{{--                    <img src="photo/шашаки.png" class="card-img-top" alt="Игровые наборы">--}}
                    <img src="{{asset('/storage/static/photo/шашаки.png')}}" class="card-img-top" alt="Игровые наборы">
                    <div class="card-body custom-body">
                        <h3 class="card-title">Логические игры</h3>
{{--                        <p class="card-text">Логическая игра</p>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="card custom-card">
                    <img src="{{asset('/storage/static/photo/дом интерьер.png')}}" class="card-img-top" alt="Конструктор">
                    <div class="card-body custom-body">
                        <h3 class="card-title">Интерьерный<br> конструктор</h3>
{{--                        <p class="card-text">Создавай уютные домики</p>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Инфа -->

    <section class="custom-banner position-relative">
        <div class="container">
            <div class="row align-items-center">
                <!-- Фото слева -->
                <div class="col-md-6">
                    <img src="{{asset('/storage/static/photo/инфа.png')}}" class="img-fluid banner-image" alt="Баннер">
                </div>
                <!-- Прозрачный стик справа -->
                <div class="col-md-6">
                    <div class="banner-text">
                        <h2 class="fw-bold">Современность</h2>
                        <p>Дети могут выбирать игрушки на любой вкус - от игрушек на радиоуправлении и конструкторов до интерактивных плюшевых игрушек и компьютерных игр.
                            Наша задача помочь подобрать вам игрушку для своего ребёнка.</p>
                        <a href="#" class="btn btn-light  text-dark fw-bold ">Посмотреть каталог</a>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <!-- Секция скидок -->
    <section class="container my-5">
        <h2 class="text-center">🔥 Наборы со скидкой 🔥</h2>
        <div id="discountCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#discountCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#discountCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#discountCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#discountCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                <button type="button" data-bs-target="#discountCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('/storage/static/photo/сельский домик.png')}}" class="d-block w-100" alt="Сельский домик">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>"Сельский домик"</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('/storage/static/photo/робо-пёс.png')}}" class="d-block w-100" alt="Робо-пёс">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>"Дай лапу"</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('/storage/static/photo/пластилин_скидка.png')}}" class="d-block w-100" alt="Магический пластилин">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>"Магический пластилин"</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('/storage/static/photo/машина_скидка.png')}}" class="d-block w-100" alt="Гоночная машина">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>"Гоночная машина"</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('/storage/static/photo/шаттл_скидка.png')}}" class="d-block w-100" alt="Космический шаттл">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>"Космический шаттл"</h5>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#discountCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Предыдущий</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#discountCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Следующий</span>
            </button>
        </div>
    </section>


    <!-- Приложение -->

    <section class="container my-5 p-4 rounded shadow gradient-section">
        <div class="row align-items-center">
            <!-- Текст слева -->
            <div class="col-md-6">
                <h2 class="text-start banner-heading">Подберём игрушку?</h2>
                <p class="text-start banner-paragraph">
                    Мы развиваемся!
                    Наша цель – улучшать друг друга. Давай постараемся выбрать что-то для тебя.
                </p>
            </div>
            <!-- Фото справа с кнопкой по центру -->
            <div class="col-md-6">
                <div class="image-wrapper">
                    <img src="{{asset('/storage/static/photo/приложение-будущее.png')}}" class="img-fluid rounded shadow" alt="Эксклюзивная игрушка">
                    <!-- Кнопка по центру изображения -->
                    <a href="{{route('catalog')}}" class="overlay-button">Подробнее</a>
                </div>
            </div>
        </div>
    </section>
@endsection
