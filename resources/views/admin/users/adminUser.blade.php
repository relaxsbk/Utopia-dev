@extends('layouts.admin')

@section('subtitle', 'Просмотр пользователя' . ' ' . $user->email)
@section('content_header_title', 'Пользователь')
@section('content_header_subtitle', $user->email)

@section('content_body')
    <x-adminlte-card title="Информация о пользователе" theme="info" icon="fas fa-user" collapsible>

        <form action="{{ route('admin.products.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-adminlte-input name="name" label="Название" value="{{ old('name', $user->firstName) }}" disabled/>
                </div>
                <div class="col-md-6 mb-3">
                    <x-adminlte-input name="price" label="Цена" value="{{ old('price', $user->lastName) }}"  disabled />
                </div>

                <div class="col-md-6 mb-3">
                    <x-adminlte-input name="discount" label="Скидка (%)" value="{{ old('discount', $user->email) }}"  disabled/>
                </div>
                <div class="col-md-6 mb-3">
                    <x-adminlte-input name="quantity" label="Количество" value="{{ old('quantity', $user->phone) }}" disabled />
                </div>


                <div class="col-md-6 mb-3">
                    <x-adminlte-input name="created_at" label="Дата регистрации" value="{{ $user->created_at->format('d.m.Y H:i') }}" disabled />
                </div>


            </div>

        </form>
    </x-adminlte-card>

    @if($user->orders->isNotEmpty())
        @foreach($user->orders as $order)
            <x-adminlte-card title="Заказ № {{$order->id}} от {{ $order->created_at->format('d.m.Y H:i') }} " theme="primary" icon="fas fa-box-open"  collapsible  >

                <div class="table-responsive mb-3">
                    <table class="table table-bordered table-hover table-striped">
                        <thead class="thead-light">
                        <tr>
                            <th>Товар</th>
                            <th>Кол-во</th>
                            <th>Цена за шт.</th>
                            <th>Общая цена</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.products.show', $item->product->id) }}">
                                        {{ $item->product->name }}
                                    </a>
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->product->price, 2, ',', ' ') }} ₽</td>
                                <td>{{ number_format($item->total, 2, ',', ' ') }} ₽</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end">
                    <div class="text-right mr-4">
                        @php
                        $color = "#" . $order->orderStatus->color
                         @endphp
                        <h5 class="font-weight-bold" style="color: {{$color}}">
                            {{$order->orderStatus->label}}
                        </h5>
                    </div>
                    <div class="text-right">
                        <h5 class="font-weight-bold">
                            Общая сумма заказа: <span class="text-success">{{ number_format($order->total, 2, ',', ' ') }} ₽</span>
                        </h5>
                    </div>
                </div>


            </x-adminlte-card>
        @endforeach
    @else
        <h2>У пользователя пока не было заказов</h2>
    @endif

    {{--    <x-adminlte-card title="Изображения товара" theme="teal" icon="fas fa-image" collapsible>--}}
{{--        <div class="row">--}}
{{--            @foreach ($product->images as $image)--}}
{{--                <div class="col-md-4 mb-3 text-center">--}}
{{--                    <img src="{{ asset($image->url) }}" alt="Product Image" style="max-width: 100%; height: 20rem;">--}}
{{--                    <div class="mt-2">--}}
{{--                        <x-adminlte-input name="position" label="Позиция" value="{{ $image->position }}" disabled />--}}
{{--                    </div>--}}
{{--                    <form action="{{ route('admin.products.image.destroy', $image) }}" method="POST" class="mt-2">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Удалить изображение?')">--}}
{{--                            <i class="fas fa-trash-alt"></i> Удалить--}}
{{--                        </button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </x-adminlte-card>--}}
{{--    <x-adminlte-card title="Добавить изображения" theme="success" icon="fas fa-upload" collapsible>--}}
{{--        <form action="{{ route('admin.products.image.update', $product) }}" method="POST" enctype="multipart/form-data">--}}
{{--            @csrf--}}
{{--            @method('PUT')--}}
{{--            <x-adminlte-input-file name="new_images[0]" label="Новое изображение (позиция 0)" />--}}
{{--            <x-adminlte-input-file name="new_images[1]" label="Новое изображение (позиция 1)" />--}}
{{--            <x-adminlte-input-file name="new_images[2]" label="Новое изображение (позиция 2)" />--}}

{{--            <x-adminlte-button label="Загрузить" theme="success" icon="fas fa-upload" class="mt-2" type="submit" />--}}
{{--        </form>--}}
{{--    </x-adminlte-card>--}}

    <div class="d-flex justify-content-between mt-4 py-3">
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Назад к списку
        </a>
{{--        <a href="{{ route('product.show', $product) }}" class="btn btn-outline-success">--}}
{{--            <i class="fas fa-eye"></i> Посмотреть--}}
{{--        </a>--}}
        <x-adminlte-button label="Удалить" icon="fas fa-fw fa-trash" data-toggle="modal"  data-target="#deleteModal-{{ $user->id }}" class="btn btn-danger" />
    </div>

    <x-adminlte-modal id="deleteModal-{{ $user->id }}" title="Удалить: {{ $user->name }}" theme="danger" icon="fas fa-trash">
        <form method="POST" id="delete-{{ $user->id }}" action="{{ route('admin.products.destroy', $user) }}">
            @csrf
            @method('DELETE')
            <p>Вы уверены, что хотите удалить <strong>{{ $user->name }}</strong>?</p>

            <x-slot name="footerSlot">
                <x-adminlte-button label="Удалить" type="submit" theme="danger" form="delete-{{ $user->id }}" />
            </x-slot>
        </form>
    </x-adminlte-modal>
@endsection
