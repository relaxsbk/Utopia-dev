@extends('adminlte::page')

{{-- Extend and customize the browser title --}}

@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle') | @yield('subtitle') @endif
@stop

{{-- Extend and customize the page content header --}}

@section('content_header')
    @hasSection('content_header_title')
        <h1 class="text-muted">
            @yield('content_header_title')

            @hasSection('content_header_subtitle')
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    @yield('content_header_subtitle')
                </small>
            @endif
        </h1>
    @endif
@stop

{{-- Rename section content to content_body --}}

@section('content')
    @yield('content_body')
@stop

{{-- Create a common footer --}}

@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '1.0.0') }}
    </div>

    <strong>
        <a href="{{ config('app.company_url', '#') }}">
            {{ config('app.company_name', 'ToyUtopia') }}
        </a>
    </strong>
@stop

{{-- Add common Javascript/Jquery code --}}

@push('js')
    <script>

        $(document).ready(function() {
            // Add your common script logic here...
        });

    </script>
@endpush

{{-- Add common CSS customizations --}}

@push('css')
    <style type="text/css">
        /* Основной фон с градиентом */
        body {
            background: linear-gradient(180deg, #789DBC 0%, rgba(235, 232, 222, 0.4) 16.72%, #FFE3E3 26.81%, rgba(235, 232, 222, 0.4) 41.77%, #C9E9D2 75.35%);
            font-family: Arial, sans-serif;
        }

        /* Прозрачная шапка */
        .custom-navbar {
            background: linear-gradient(0deg, rgba(254, 249, 242, 0.3), rgba(254, 249, 242, 0.3)), linear-gradient(90deg, rgba(120, 157, 188, 0.6) 0%, rgba(255, 227, 227, 0.6) 38%, rgba(254, 249, 242, 0.6) 70.5%, rgba(201, 233, 210, 0.6) 100%);
            backdrop-filter: blur(10px); /* Эффект размытия */
            padding: 10px 0;
        }

        nav a {
            margin: 0 5px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        /* Логотип */
        .logo-img {
            width: 40px;
            height: auto;
        }

        /* Иконки корзины и авторизации */
        .icon-img {
            width: 30px;
            height: auto;
            transition: transform 0.2s ease-in-out;
        }

        .icon-img:hover {
            transform: scale(1.1);
        }

        /* Кнопка Вход */
        .login-btn {
            background-color: white;
            color: #363434d4;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            font-family: 'Poppins', sans-serif;
            padding: 5px 13px;
            border-radius: 5px;
            font-weight: bold;
            transition: 0.3s;
            position: relative;
            top: 5px;
        }

        .login-btn:hover {
            background: linear-gradient(180deg, #789DBC 0%, rgba(235, 232, 222, 0.4) 16.72%, #FFE3E3 26.81%, rgba(235, 232, 222, 0.4) 41.77%, #C9E9D2 75.35%);
            color: white;
        }

        footer {
            background: linear-gradient(90deg, rgba(120, 157, 188, 0.6) 0%, rgba(255, 227, 227, 0.6) 38%, rgba(254, 249, 242, 0.6) 70.5%, rgba(201, 233, 210, 0.6) 100%);
            backdrop-filter: blur(10px);
            padding: 40px 0;
        }

        .footer {
            padding: 40px 20px;
            background: linear-gradient(90deg, #9AC1D0, #EBECE3, #CFE8D4);
            color: #333;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;
        }

        .footer-column {
            display: flex;
            flex-direction: column;
        }

        .footer-heading {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .footer-text {
            color: #5f8ca6;
            font-size: 16px;
        }

        .footer-link {
            color: #5f8ca6;
            text-decoration: none;
            margin: 4px 0;
            font-size: 16px;
        }

        .footer-link:hover {
            text-decoration: underline;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 1rem;
        }

        .breadcrumb-item a {
            position: relative;
            color: #333;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-item a::after {
            content: "";
            position: absolute;
            width: 0%;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: #FEF9F2;
            transition: width 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: #FEF9F2;
        }

        .breadcrumb-item a:hover::after {
            width: 100%;
        }
    </style>
@endpush

