@extends('layouts.main')
@section('title', 'Регистрация')

@section('style')
    <style>


        .login-wrapper {
            display: flex;
            width: 100%;
            max-width: 950px;
            height: 480px;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.6); /* лёгкая прозрачность */
            backdrop-filter: blur(10px);
        }

        .login-left {
            flex: 1;
            padding: 40px;
            background: rgb(255, 255, 255);
            border-radius: 24px 0 0 24px;
        }



        .login-right {
            flex: 1;
            background: none;
            padding: 0;
            margin: 0;
        }

        .login-right img {
            width: 100%;
            height: 100%;

            border-radius: 0 24px 24px 0;
        }

        .login-left {
            flex: 1;
            padding: 40px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-right {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #fff;
            padding: 20px;
        }


        .login-left h2 {
            font-family: 'Comic Sans MS', cursive;
            font-size: 28px;
            margin-bottom: 24px;
            text-align: center;
        }

        /*.login-left input[type="text"],*/
        /*.login-left input[type="email"],*/
        /*.login-left input[type="password"] {*/
        /*    width: 100%;*/
        /*    padding: 14px;*/
        /*    margin-bottom: 16px;*/
        /*    border: 1px solid #ccc;*/
        /*    border-radius: 10px;*/
        /*    background: #ffe88d;*/
        /*    font-size: 16px;*/
        /*}*/

        .checkbox-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            font-size: 15px;
        }

        .checkbox-container input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #3b77b9;
        }

        .login-left button {
            width: 100%;
            background: #333;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 14px;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
        }

        .login-left small {
            display: block;
            margin-top: 14px;
            font-size: 14px;
            text-align: center;
        }

        .login-right h3 {
            font-size: 24px;
            color: #3b77b9;
            margin-bottom: 20px;
            text-align: center;
        }


        .discount {
            position: absolute;
            bottom: 30px;
            right: 30px;
            font-size: 24px;
            font-weight: bold;
            color: #3b77b9;
        }

        @media (max-width: 900px) {
            .login-wrapper {
                flex-direction: column;
                height: auto;
            }
            .login-right img {
                max-height: 250px;
            }
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
                    Регистрация
                </li>

            </ol>
        </nav>
    </div>
    <section class="d-flex justify-content-center items-center">
        <div class="login-wrapper h-auto ">

            <!-- Левая колонка -->
            <div class="login-left">
                <h2>ToyUtopia</h2>

                <form action="{{route('register.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <input style="padding: 14px" type="text" name="firstName" value="{{old('firstName')}}" class="form-control  @error('firstName') is-invalid @enderror" placeholder="Имя" required />
                        @error('firstName')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input style="padding: 14px" type="text" name="lastName" value="{{old('lastName')}}" class="form-control  @error('lastName') is-invalid @enderror" placeholder="Фамилия" required />
                        @error('lastName')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input style="padding: 14px" type="email" name="email" value="{{old('email')}}" class="form-control  @error('email') is-invalid @enderror" placeholder="Электронная почта" required />
                        @error('email')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input style="padding: 14px" type="text" name="phone" value="{{old('phone')}}" class="form-control  @error('phone') is-invalid @enderror" placeholder="Номер телефона" required />
                        @error('phone')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input style="padding: 14px" type="password" name="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Пароль" required />
                        @error('password')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input style="padding: 14px" type="password" name="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror" placeholder="Подтверждение пароля" required />
                        @error('password_confirmation')
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit">Зарегистрироваться</button>
                    <small>У вас уже есть аккаунт? <a href="{{route('login')}}">Авторизоваться</a></small>
                </form>
            </div>

            <!-- Правая колонка -->
            <div class="login-right">
                <img src="{{asset('storage/static/photo/мальчик1_1.png')}}" alt="Мальчик с игрушкой">
            </div>
        </div>
    </section>

@endsection
