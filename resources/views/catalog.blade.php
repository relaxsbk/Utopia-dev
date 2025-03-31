@extends('layouts.main')
@section('title', 'Каталог')

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
            <img src="{{asset('/storage/static/photo/лего-дом.png')}}" class="card-img-top" alt="Lego">
            <div class="card-body custom-body">
                <h3 class="card-title text-black text-center text-wrap text-break">Ясель</h3>
            </div>
        </a>
        <a href="/" class="card custom-card">
            <img src="{{asset('/storage/static/photo/лего-дом.png')}}" class="card-img-top" alt="Lego">
            <div class="card-body custom-body">
                <h3 class="card-title text-black text-center text-wrap text-break">Дошкольники</h3>
            </div>
        </a>
        <a href="/" class="card custom-card">
            <img src="{{asset('/storage/static/photo/лего-дом.png')}}" class="card-img-top" alt="Lego">
            <div class="card-body custom-body">
                <h3 class="card-title text-black text-center text-wrap text-break">Школьники</h3>
            </div>
        </a>
    </div>
@endsection
