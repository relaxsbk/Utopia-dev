@extends('layouts.admin')

@section('subtitle', 'Административная панель')
@section('content_header_title', 'Административная панель')
{{--@section('content_header_subtitle', 'Welcome')--}}

{{-- Content body: main page content --}}

@section('content_body')
    <div class="row">
        <div class="col-md-6 col-xl-3 mb-4">
            <x-adminlte-card title="Заказы" theme="primary" icon="fas fa-scroll" class="h-100" footerSlot>
                <a href="{{route('admin.orders.index')}}" class="stretched-link text-decoration-none text-dark">
                    Перейти к списку каталогов
                </a>
            </x-adminlte-card>

        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <x-adminlte-card title="Каталоги" theme="indigo" icon="fas fa-folder" class="h-100" footerSlot>
                <a href="{{route('admin.catalog.index')}}" class="stretched-link text-decoration-none text-dark">
                    Перейти к списку каталогов
                </a>
            </x-adminlte-card>

        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <x-adminlte-card title="Категории" theme="indigo" icon="fas fa-book" class="h-100" footerSlot>
                <a href="{{route('admin.category.index')}}" class="stretched-link text-decoration-none text-dark">
                    Перейти к списку категорий
                </a>
            </x-adminlte-card>

        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <x-adminlte-card title="Бренды" theme="indigo" icon="fas fa-star" class="h-100" footerSlot>
                <a href="{{route('admin.brand.index')}}" class="stretched-link text-decoration-none text-dark">
                    Перейти к списку брендов
                </a>
            </x-adminlte-card>

        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <x-adminlte-card title="Товары" theme="indigo" icon="fas fa-puzzle-piece" class="h-100" footerSlot>
                <a href="{{route('admin.products.index')}}" class="stretched-link text-decoration-none text-dark">
                    Перейти к списку товаров
                </a>
            </x-adminlte-card>

        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <x-adminlte-card title="Пользователи" theme="indigo" icon="fas fa-users" class="h-100" footerSlot>
                <a href="{{route('admin.users.index')}}" class="stretched-link text-decoration-none text-dark">
                    Перейти к списку пользователей
                </a>
            </x-adminlte-card>

        </div>


    </div>
@endsection


{{-- Push extra CSS --}}

@push('css')
    <style>
        .card {
            transition: transform 0.2s ease-in-out;
        }

        .card:hover {
            transform: scale(1.03);
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
    </style>
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script>
    </script>
@endpush
