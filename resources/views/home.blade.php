@extends('layouts.main')
@section('title', 'home')

@section('main')
    <header class="hero text-white d-flex flex-column align-items-center justify-content-center">
        <div class="container position-relative">
            <img src="{{asset('/storage/static/photo/вверх.png')}}" alt="Banner" class="hero-image"> <!-- Фоновое фото -->
            <a href="katalog.html" class="btn custom-btn">Перейти в каталог</a>
        </div>
    </header>

    <div class=".custom-navbar">

    </div>

    <!-- карточка брендов -->
    <!-- СЕКЦИЯ БРЕНДОВ -->
    <section class="brand-section my-5">
        <div class="container">
            <div class="brand-wrapper py-4 rounded-4 shadow">
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
                <div class="card custom-card">
                    <img src="{{asset('/storage/static/photo/лего-дом.png')}}" class="card-img-top" alt="Lego">
                    <div class="card-body custom-body">
                        <h3 class="card-title">Lego</h3>
                        <p class="card-text">Конструкторы</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="card custom-card">
                    <img src="{{asset('/storage/static/photo/робот-машина.png')}}" class="card-img-top" alt="Роботы">
                    <div class="card-body custom-body">
                        <h3 class="card-title">Робот-машина</h3>
                        <p class="card-text">Интерактивные игрушки</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="card custom-card">
                    <img src="{{asset('/storage/static/photo/барби (2).png')}}" class="card-img-top" alt="Барби">
                    <div class="card-body custom-body">
                        <h3 class="card-title">Барби</h3>
                        <p class="card-text">Любимые куклы</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="card custom-card">
{{--                    <img src="photo/шашаки.png" class="card-img-top" alt="Игровые наборы">--}}
                    <img src="{{asset('/storage/static/photo/шашаки.png')}}" class="card-img-top" alt="Игровые наборы">
                    <div class="card-body custom-body">
                        <h3 class="card-title">Шахматы</h3>
                        <p class="card-text">Логическая игра</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="card custom-card">
                    <img src="{{asset('/storage/static/photo/дом интерьер.png')}}" class="card-img-top" alt="Конструктор">
                    <div class="card-body custom-body">
                        <h3 class="card-title">Интерьерный конструктор</h3>
                        <p class="card-text">Создавай уютные домики</p>
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
                        <a href="#" class="btn btn-light text-dark fw-bold ">Посмотреть каталог</a>
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
                    <a href="#" class="overlay-button">Подробнее</a>
                </div>
            </div>
        </div>
    </section>
@endsection
