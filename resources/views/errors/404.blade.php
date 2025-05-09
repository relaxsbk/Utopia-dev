@extends('layouts.main')

@section('title', 'Страница не найдена')

@section('main')

    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="text-center">
            <h1 class="display-1 fw-bolder">404</h1>
            <p class="lead">Страница не найдена или находиться в разработке</p>
            <a href="{{route('home')}}" class="btn btn-primary">Вернуться на главную</a>
        </div>
    </div>
@endsection
