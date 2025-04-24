@extends('layouts.admin')

@section('subtitle', 'Товары')
@section('content_header_title', 'Административная панель')
@section('content_header_subtitle', 'ТОВАРЫ')

@section('content_body')
    @php
        $heads = [
            '#',
            'Категория',
            'Бренд',
            'Главная картинка',
            'Название',
            'Описание',
            'Цена',
            'Скидка',
            'Кол-во',
            'Дата создания',
            'Публикация',
            ['label' => 'Действия', 'no-export' => true, 'width' => 20],
        ];


//    if (session()->has("errors")) {
//        dd(session()->get('errors'));
//    }
    @endphp

    <div class="d-flex justify-content-end mb-3">
        <x-adminlte-button label="Добавить" data-toggle="modal" data-target="#createModal" class="btn btn-success" />
    </div>

    @if($categories->isNotEmpty())
        <x-adminlte-datatable id="catalogTable" :heads="$heads" striped hoverable bordered compressed>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->brand->name }}</td>
                    <td>
                        @php
                            $mainImage = $product->images->where('position', 0)->first();
                        @endphp
                        @if ($mainImage)
                            <img style="width: 50px; height: 50px;" src="{{ asset($mainImage->url) }}" alt="image">
                        @else
                            —
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->shortDescription() }}</td>
                    <td>{{ $product->price }} ₽</td>
                    <td>{{ $product->discount }} %</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->created_at->format('d.m.Y H:i') }}</td>
                    <td>{{ $product->published ? 'Да' : 'Нет' }}</td>
                    <td>
                        <a class="btn btn-sm btn-outline-secondary" href="{{route('admin.products.show', $product)}}">
                            <i class="fas fa-eye"></i>
                        </a>
                        <x-adminlte-button label="Редактировать" data-toggle="modal" data-target="#editModal-{{ $product->id }}" class="btn btn-sm btn-primary" />
                        <x-adminlte-button label="Удалить" data-toggle="modal" data-target="#deleteModal-{{ $product->id }}" class="btn btn-sm btn-danger" />
                    </td>
                </tr>

                {{-- Модалка редактирования --}}
                <x-adminlte-modal id="editModal-{{ $product->id }}" title="Редактировать: {{ $product->name }}" theme="primary" icon="fas fa-edit" size="lg" scrollable>
                    <form method="POST" id="edit-{{ $product->id }}" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <x-adminlte-select name="category_id" label="Категория">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </x-adminlte-select>

                        <x-adminlte-select name="brand_id" label="Бренд">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </x-adminlte-select>

                        <x-adminlte-input name="name" label="Название" value="{{ $product->name }}" />
                        <x-adminlte-textarea name="description" label="Описание">{{ $product->description }}</x-adminlte-textarea>
                        <x-adminlte-input name="price" type="number" min="0" label="Цена" value="{{ $product->price }}" />
                        <x-adminlte-input name="discount" type="number" min="0" label="Скидка (в процентах)" value="{{ $product->discount }}" />
                        <x-adminlte-input name="quantity" type="number" min="0" label="Количество" value="{{ $product->quantity }}" />

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="published" id="published-{{ $product->id }}" {{ $product->published ? 'checked' : '' }}>
                                <label class="form-check-label" for="published-{{ $product->id }}">
                                    Опубликован
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Изображения:</label>
                            @foreach ($product->images as $image)
                                <div class="mb-2 d-flex align-items-center justify-content-between gap-1">
                                    <img src="{{ asset($image->url) }}" style="width: 100px;" class="mr-3" alt="img">
                                </div>
                            @endforeach
                            <x-adminlte-input-file name="new_images[0]" label="Новое изображение (позиция 0)" />
                            <x-adminlte-input-file name="new_images[1]" label="Новое изображение (позиция 1)" />
                            <x-adminlte-input-file name="new_images[2]" label="Новое изображение (позиция 2)" />
                        </div>

                        <x-slot name="footerSlot">
                            <x-adminlte-button label="Сохранить" type="submit" theme="primary" form="edit-{{ $product->id }}" />
                        </x-slot>
                    </form>
                </x-adminlte-modal>

                {{-- Модалка удаления --}}
                <x-adminlte-modal id="deleteModal-{{ $product->id }}" title="Удалить: {{ $product->name }}" theme="danger" icon="fas fa-trash">
                    <form method="POST" id="delete-{{ $product->id }}" action="{{ route('admin.products.destroy', $product) }}">
                        @csrf
                        @method('DELETE')
                        <p>Вы уверены, что хотите удалить <strong>{{ $product->name }}</strong>?</p>

                        <x-slot name="footerSlot">
                            <x-adminlte-button label="Удалить" type="submit" theme="danger" form="delete-{{ $product->id }}" />
                        </x-slot>
                    </form>
                </x-adminlte-modal>
            @endforeach
        </x-adminlte-datatable>
    @else
        <h2>Записей пока нет 😥</h2>
    @endif

    <div class="mt-3">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>

    {{-- Модалка создания --}}
    <x-adminlte-modal id="createModal" title="Добавить новый товар" theme="success" icon="fas fa-plus" size="lg" scrollable>
        @php $formId = 'create-catalog-form'; @endphp

        <form id="{{ $formId }}" method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
            @csrf

            <x-adminlte-select name="category_id" label="Категория">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </x-adminlte-select>

            <x-adminlte-select name="brand_id" label="Бренд">
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </x-adminlte-select>

            <x-adminlte-input name="name" label="Название" />
            <x-adminlte-textarea name="description" label="Описание"></x-adminlte-textarea>
            <x-adminlte-input name="price" type="number" min="0" label="Цена" />
            <x-adminlte-input name="discount" type="number" min="0" label="Скидка (в процентах)" />
            <x-adminlte-input name="quantity" type="number" min="0" label="Количество" />

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="published" id="published">
                    <label class="form-check-label" for="published">
                        Опубликован
                    </label>
                </div>
            </div>

            <x-adminlte-input-file name="images[0]" label="Главное изображение (позиция 0)" />
            <x-adminlte-input-file name="images[1]" label="Доп. изображение 1 (позиция 1)" />
            <x-adminlte-input-file name="images[2]" label="Доп. изображение 2 (позиция 2)" />
        </form>

        <x-slot name="footerSlot">
            <x-adminlte-button label="Создать" type="submit" theme="success" form="{{ $formId }}" />
        </x-slot>
    </x-adminlte-modal>
@endsection

@push('css')
@endpush

@push('js')
@endpush
