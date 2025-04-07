@extends('layouts.main')
@section('title', 'Купить'. ' ' . $product->name . ' | '.' '.'ToyUtopia')


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
        .buttonDis {
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
    <div class="container py-3 mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{route('catalog')}}">Каталог</a></li>
                <li class="breadcrumb-item"><a href="{{route('catalog.show', $product->category->catalog)}}">{{$product->category->catalog->name}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('categoryWithProducts', $product->category)}}">{{$product->category->name}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
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
                <h2>{{$product->name}}</h2>
                @if($product->discount > 0)
                    <div class="product-price mb-3">
                        <span class="old-price">{{$product->money()}} ₽</span>
                        <span class="new-price">{{$product->priceDiscount()}} ₽</span>
                    </div>
                @else
                    <div class="product-price mb-3">
                        <span class="new-price">{{$product->money()}} ₽</span>
                    </div>
                @endif

                <div class="d-flex align-items-center mb-3">
                    <label for="quantity" class="me-2">Количество:</label>
                    <span class="text-muted ms-3">{{$product->quantity}} в наличии</span>
                </div>

                <div class="d-flex gap-2 mb-4">
                    @if (auth()->check())
                        @if ($isFavorite)
                            <form method="POST" action="{{ route('removeFromFavorites', $product) }}" class="">
                                @csrf
                                @method('DELETE')
                                <button class="button" title="Убрать из избранного">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart-fill text-danger" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                                    </svg>
                                </button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('addToFavorite', $product) }}">
                                @csrf
                                <button class="button" title="Добавить в избранное">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                    </svg>
                                </button>
                            </form>
                        @endif
                    @else
                        <button class="buttonDis" title="Добавить в избранное" disabled >
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                            </svg>
                        </button>
                    @endif


                        @if (auth()->check())
                            @if ($isInCart)
                                <form method="POST" action="{{ route('removeFromCart', $product) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button danger" type="submit">Удалить из корзины</button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('addToCart', $product) }}">
                                    @csrf
                                    <button class="button" type="submit">В КОРЗИНУ</button>
                                </form>
                            @endif
                        @else
                            <button class="buttonDis" disabled type="submit">В КОРЗИНУ</button>
                        @endif
                </div>

                @guest
                    <p class="text-secondary fs-5 border-start border-3 px-2 py-3 ">Чтобы добавить товар в корзину или избранное, требуется <a class="text-secondary text-decoration-none" href="{{route('login')}}">авторизоваться</a></p>
                @endguest
                <div class="product-description mb-4">
                    <h5 class="mb-2">Описание</h5>
                    <p>
                        {{$product->description}}
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
