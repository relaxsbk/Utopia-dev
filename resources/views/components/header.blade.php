<div>
    <nav class="navbar navbar-expand-lg fixed-top custom-navbar">
        <div class="container">
            <!-- Логотип + Название -->
            <a class="navbar-brand d-flex align-items-center" href="{{route('home')}}">
                <img src="{{asset('/storage/static/photo/лого.png')}}" alt="Логотип" class="logo-img me-2">
                <span class="fw-bold">ToyUtopia</span>
            </a>

            <!-- Бургер-меню для мобилки -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Основные ссылки -->
                <ul class="navbar-nav ms-auto d-flex align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Доставка</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('catalog')}}">Каталог</a>
                    </li>
                </ul>

                <!-- Иконки справа -->
                <ul class="navbar-nav ms-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cart')}}">
                            <img src="{{asset('/storage/static/photo/Vector.png')}} " alt="cart" class="icon-img">
                        </a>
                    </li>
                    <li class="nav-item">
                       @if(auth()->check())
                            <a class="nav-link" href="{{route('profile')}}">
                                <img src="{{asset('/storage/static/photo/v.png')}}" alt="profile" class="icon-img">
                            </a>
                       @else
                            <a class="nav-link" href="{{route('login')}}">
                                <img src="{{asset('/storage/static/photo/v.png')}}" alt="profile" class="icon-img">
                            </a>
                       @endif
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</div>
