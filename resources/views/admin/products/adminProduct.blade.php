@extends('layouts.admin')

@section('subtitle', 'Просмотр товара')
@section('content_header_title', 'Товар')
@section('content_header_subtitle', $product->name)

@section('content_body')
    <x-adminlte-card title="Информация о товаре" theme="info" icon="fas fa-box-open" collapsible>

        <form action="{{ route('admin.products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-adminlte-input name="name" label="Название" value="{{ old('name', $product->name) }}" />
                </div>
                <div class="col-md-6 mb-3">
                    <x-adminlte-input name="price" label="Цена" value="{{ old('price', $product->price) }}" type="number" step="0.01" />
                </div>

                <div class="col-md-6 mb-3">
                    <x-adminlte-input name="discount" label="Скидка (%)" value="{{ old('discount', $product->discount) }}" type="number" />
                </div>
                <div class="col-md-6 mb-3">
                    <x-adminlte-input name="quantity" label="Количество" value="{{ old('quantity', $product->quantity) }}" type="number" />
                </div>

                <div class="col-md-6 mb-3">
                    <x-adminlte-select name="category_id" label="Категория">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </x-adminlte-select>
                </div>

                <div class="col-md-6 mb-3">
                    <x-adminlte-select name="brand_id" label="Бренд">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" @selected(old('brand_id', $product->brand_id) == $brand->id)>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </x-adminlte-select>
                </div>

                <div class="col-12 mb-3">
                    <x-adminlte-textarea name="description" label="Описание">
                        {{ old('description', $product->description) }}
                    </x-adminlte-textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <x-adminlte-input name="created_at" label="Дата создания" value="{{ $product->created_at->format('d.m.Y H:i') }}" disabled />
                </div>

                <div class="col-md-6 mb-3">
                    <x-adminlte-select name="published" label="Опубликован">
                        <option value="0" @selected(!$product->published)>Нет</option>
                        <option value="1" @selected($product->published)>Да</option>
                    </x-adminlte-select>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <x-adminlte-button label="Сохранить изменения" theme="success" icon="fas fa-save" type="submit" />
            </div>
        </form>
    </x-adminlte-card>


    <x-adminlte-card title="Изображения товара" theme="teal" icon="fas fa-image" collapsible>
        <div class="row">
            @foreach ($product->images as $image)
                <div class="col-md-4 mb-3 text-center">
                    <img src="{{ asset($image->url) }}" alt="Product Image" style="max-width: 100%; height: 20rem;">
                    <div class="mt-2">
                        <x-adminlte-input name="position" label="Позиция" value="{{ $image->position }}" disabled />
                    </div>
                    <form action="{{ route('admin.products.image.destroy', $image) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Удалить изображение?')">
                            <i class="fas fa-trash-alt"></i> Удалить
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </x-adminlte-card>
    <x-adminlte-card title="Добавить изображения" theme="success" icon="fas fa-upload" collapsible>
        <form action="{{ route('admin.products.image.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <x-adminlte-input-file name="new_images[0]" label="Новое изображение (позиция 0)" />
            <x-adminlte-input-file name="new_images[1]" label="Новое изображение (позиция 1)" />
            <x-adminlte-input-file name="new_images[2]" label="Новое изображение (позиция 2)" />

            <x-adminlte-button label="Загрузить" theme="success" icon="fas fa-upload" class="mt-2" type="submit" />
        </form>
    </x-adminlte-card>

    <div class="d-flex justify-content-between mt-4 py-3">
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Назад к списку
        </a>
        <div>
{{--            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary">--}}
{{--                <i class="fas fa-edit"></i> Редактировать--}}
{{--            </a>--}}
            <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" onclick="return confirm('Удалить товар?')">
                    <i class="fas fa-trash"></i> Удалить
                </button>
            </form>
        </div>
    </div>
@endsection
