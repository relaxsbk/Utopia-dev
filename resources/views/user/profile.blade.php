@extends('layouts.main')
@section('title', 'Профиль')

@section('style')
    <style>
        /* профиль */

        .profile-card {
            background-color:#d5d6d67b; /* Прозрачный белый */
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.171);
            padding: 30px;
            margin-bottom: 80px; /* Отступ от футера */

        }


        .bonus-block {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 12px;
            font-weight: bold;
            color: #333;
        }


        .favorite-toy-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;

        }
        .card-k {
            width: 260px;
            height: 370px;
            border-radius: 12px;
            overflow: hidden;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card-k:hover {
            transform: scale(1.05);
        }

        .card-k img {
            height: 280px; /* Увеличиваем высоту фото */
            width: 100%;
            object-fit: cover;
        }


        .card-k-title {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 10px;
        }


        :root {
            --btn-bg: #789DBC;
            --btn-bg-hover: #f0f0f0;
            --btn-text-color: #333333;
            --btn-border-color: #cccccc;
            --btn-shadow-hover: 0 4px 12px rgba(0, 0, 0, 0.1);
            --btn-padding: 12px 24px;
            --btn-font-size: 16px;
            --btn-radius: 8px;
            --btn-transition-speed: 0.3s;
            --btn-margin-top: 20px;
            --btn-margin-bottom: 20px;
        }

        .edit-profile-button {
            background: radial-gradient(100% 659.39% at 50% 50%, #FFE3E3 2.88%, #789DBC );
            color: var(--btn-text-color);
            border: 1px solid var(--btn-border-color);
            padding: var(--btn-padding);
            font-size: var(--btn-font-size);
            border-radius: var(--btn-radius);
            cursor: pointer;
            transition: all var(--btn-transition-speed) ease;
            margin-top: var(--btn-margin-top);
            margin-bottom: var(--btn-margin-bottom);
        }

        .edit-profile-button:hover {
            background-color: var(--btn-bg-hover);
            box-shadow: var(--btn-shadow-hover);
            transform: scale(1.02);
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
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">Главная</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Профиль
                </li>

            </ol>
        </nav>
    </div>

    <!-- Профиль -->
    <div class="container  pt-5 ">
        <div class="row justify-content-center">
            <div class="col-md-8 profile-card text-center">
                <h4 class="fw-bold">{{auth()->user()->firstName}} {{auth()->user()->lastName}}</h4>
                <p class="text-muted">{{auth()->user()->email}}</p>
                <p class="text-muted">{{auth()->user()->phone}}</p>
                <div class="d-flex justify-content-center gap-2">
{{--                                    <button class="edit-profile-button">Перейти в панель администратора</button>--}}
{{--                    <button class="edit-profile-button">Редактировать профиль</button>--}}
                    <button type="button" class="edit-profile-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Редактировать профиль
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Редактирование профиля</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="edit" action="*" method="post">
                                    <div class="modal-body text-start">
                                        @csrf
                                        <div class="mb-3">
                                            <input style="padding: 14px" type="text" name="firstName" value="{{auth()->user()->firstName}}" class="form-control  @error('firstName') is-invalid @enderror" placeholder="Имя" required />
                                            @error('firstName')
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input style="padding: 14px" type="text" name="lastName" value="{{auth()->user()->lastName}}" class="form-control  @error('lastName') is-invalid @enderror" placeholder="Фамилия" required />
                                            @error('lastName')
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input style="padding: 14px" type="email" name="email" value="{{auth()->user()->email}}" class="form-control  @error('email') is-invalid @enderror" placeholder="Электронная почта" required />
                                            @error('email')
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <input style="padding: 14px" type="text" name="phone" value="{{auth()->user()->phone}}" class="form-control  @error('phone') is-invalid @enderror" placeholder="Номер телефона" required />
                                            @error('phone')
                                            <div id="validationServerUsernameFeedback" class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit"  class="btn btn-primary">Сохранить изменения</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>


                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="edit-profile-button">Выход</button>
                    </form>
                </div>
{{--                <div class="bonus-block mb-4">🎁 Ваши бонусы: <span class="text-success">1 240</span> баллов</div>--}}
                <div class="mt-10">
                    <h5 class="mb-3 fw-bolder">Любимые игрушки</h5>
                    <div class="row g-3">
                        @if($favoriteProducts->isEmpty())
                            <p class="text-black text-center fs-4 ">Вы пока не добавляли товар в избранное 😥</p>
                        @else
                            @foreach($favoriteProducts as $product)
                                <a href="{{route('product.show', $product)}}" class="col-md-4 text-decoration-none text-black">
                                    <div class="favorite-toys-container">
                                        <div class="card-k">
                                            <img src="{{asset('storage/static/photo/опыти и экспереметы.png')}}" class="card-k-img-top" alt="Игровые наборы">
                                            <div class="card-k-body">
                                                <h6 class="card-k-title">{{$product->name}}</h6>
                                                <div class="category">Категория: {{$product->category->name}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>

                <a href="{{route('cart')}}" class="btn btn-dark mt-4">Перейти в корзину</a>
            </div>
        </div>
    </div>

   @if($orders->isNotEmpty())
       <section class="container my-5">
           <h2 class="text-center mb-5 display-5 fw-bold">🛒 История заказов 🛒</h2>
           <div class="d-flex justify-content-between flex-wrap">
               @foreach ($orders as $order)
                   <div class="card mb-3">
                       <div class="card-body">
                           <h5 class="card-title">Заказ №{{ $order->id }}</h5>
                           <p class="card-text">Дата заказа: {{ $order->created_at->format('d.m.Y') }}</p>
                           <p class="card-text">Статус: {{ $order->orderStatus->label }}</p> <!-- Если у вас есть статус заказа -->
                           <p class="card-text">Сумма: {{ $order->total }} ₽</p>
                       </div>
                   </div>
               @endforeach
           </div>
       </section>
   @endif

    <section class="container my-5">
        <h2 class="text-center mb-5 display-5 fw-bold">🧸 Каталог 🧸</h2>

        <!-- Категории товаров -->
        <section class="container my-5">
            <div class="row text-center justify-content-center">
                @foreach($categories as $category)
                    <div class="col-md-4 col-lg-2">
                        <a href="{{route('categoryWithProducts', $category)}}" class="card custom-card text-black text-decoration-none">
                            <img src="{{asset('storage/static/photo/кар-каталог-1.webp')}}" class="card-img-top" alt="Мягкие игрушки">
                            <div class="card-body custom-body">
                                <h3 class="card-title">{{$category->name}}</h3>

                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </section>
    </section>
@endsection
