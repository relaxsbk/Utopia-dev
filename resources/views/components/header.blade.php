<div>
    <nav class="navbar navbar-expand-lg fixed-top custom-navbar">
        <div class="container">
            <!-- Логотип + Название -->
            <a class="navbar-brand d-flex align-items-center" href="prob.html">
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
                    <li class="nav-item"><a class="nav-link" href="#">Доставка</a></li>
                    <li class="nav-item"><a class="nav-link" href="katalog.html">Каталог</a></li>
                </ul>

                <!-- Иконки справа -->
                <ul class="navbar-nav ms-3">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <img src="{{asset('/storage/static/photo/Vector.png')}} " alt="" class="icon-img">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profil.html">
                            <img src="{{asset('/storage/static/photo/v.png')}}" alt="" class="icon-img">
                        </a>
                    </li>
                    <li class="nav-item mt-1">
                        <a href="vhod.html" class="btn btn-outline-secondary">Вход</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
