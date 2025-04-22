@extends('layouts.admin')

@section('subtitle', 'Welcome')
@section('content_header_title', 'Административная панель')
@section('content_header_subtitle', 'КАТЕГОРИИ')

{{-- Content body: main page content --}}

@section('content_body')
    @php
        $heads = [
            '#',
            'Каталог',
            'Картинка',
            'Название',
            'Описание',
            'Дата создания',
            'Публикация',
            ['label' => 'Действия', 'no-export' => true, 'width' => 20],
        ];
    @endphp

    {{-- Кнопка добавления новой записи --}}
    <div class="d-flex justify-content-end mb-3">
        <x-adminlte-button label="Добавить" data-toggle="modal" data-target="#createModal" class="btn btn-success" />
    </div>

    {{-- Таблица --}}
    @if($categories->isNotEmpty())
        <x-adminlte-datatable id="catalogTable" :heads="$heads" striped hoverable bordered compressed>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->catalog->name }}</td>
                    <td>

                        <img style="width: 50px; height: 50px;" src="{{asset($category->image)}}" alt="da" >
                    </td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->created_at->format('d.m.Y H:i') }}</td>
                    <td>{{ $category->published ? 'Да' : 'Нет' }}</td>
                    <td>
                        <x-adminlte-button label="Редактировать" data-toggle="modal" data-target="#editModal-{{ $category->id }}" class="btn btn-sm btn-primary" />
                        <x-adminlte-button label="Удалить" data-toggle="modal" data-target="#deleteModal-{{ $category->id }}" class="btn btn-sm btn-danger" />
                    </td>
                </tr>

                {{-- Модалка редактирования --}}
                <x-adminlte-modal id="editModal-{{ $category->id }}" title="Редактировать: {{ $category->name }}" theme="primary" icon="fas fa-edit" size="lg" scrollable>
                    <form method="POST" id="edit-{{ $category->id }}" action="{{ route('admin.category.update', $category) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <x-adminlte-select name="catalog_id" label="Каталог">
                            @foreach ($catalogs as $catalog)
                                <option value="{{ $catalog->id }}" {{ $catalog->id == $category->catalog_id ? 'selected' : '' }}>
                                    {{ $catalog->name }}
                                </option>
                            @endforeach
                        </x-adminlte-select>

                        <x-adminlte-input name="name" label="Название" value="{{ $category->name }}" />
                        <x-adminlte-textarea name="description" label="Описание">{{ $category->description }}</x-adminlte-textarea>


                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="published" id="published-{{ $category->id }}" {{ $category->published ? 'checked' : '' }}>
                                <label class="form-check-label" for="published-{{ $category->id }}">
                                    Опубликован
                                </label>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label>Текущее изображение:</label><br>
                            <img src="{{ $category->image }}" alt="Image" style="max-width: 150px; max-height: 150px;">
                        </div>

                        <x-adminlte-input-file name="image" label="Новое изображение" />

                        <x-slot name="footerSlot">
                            <x-adminlte-button label="Сохранить" type="submit" theme="primary" form="edit-{{ $category->id }}" />
                        </x-slot>
                    </form>
                </x-adminlte-modal>

                {{-- Модалка удаления --}}
                <x-adminlte-modal id="deleteModal-{{ $category->id }}" title="Удалить: {{ $category->name }}" theme="danger" icon="fas fa-trash">
                    <form method="POST" id="delete-{{ $category->id }}" action="{{ route('admin.category.destroy', $category) }}">
                        @csrf
                        @method('DELETE')

                        <p>Вы уверены, что хотите удалить <strong>{{ $category->name }}</strong>?</p>

                        <x-slot name="footerSlot">
                            <x-adminlte-button label="Удалить" type="submit" theme="danger" form="delete-{{ $category->id }}" />
                        </x-slot>
                    </form>
                </x-adminlte-modal>
            @endforeach
        </x-adminlte-datatable>
    @else
        <h2>Записей пока нет 😥</h2>
    @endif

    <div class="mt-3">
        {{ $categories->links('pagination::bootstrap-5') }}
    </div>

    {{-- Модалка создания новой записи --}}
    <x-adminlte-modal id="createModal" title="Добавить новый каталог" theme="success" icon="fas fa-plus" size="lg" scrollable>
        @php $formId = 'create-catalog-form'; @endphp

        <form id="{{ $formId }}" method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
            @csrf

            <x-adminlte-select name="catalog_id" label="Каталог">
                @foreach ($catalogs as $catalog)
                    <option value="{{ $catalog->id }}">{{ $catalog->name }}</option>
                @endforeach
            </x-adminlte-select>

            <x-adminlte-input name="name" label="Название" />
            <x-adminlte-textarea name="description" label="Описание"></x-adminlte-textarea>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="published" id="published">
                    <label class="form-check-label" for="published">
                        Опубликован
                    </label>
                </div>
            </div>
            <x-adminlte-input-file name="image" label="Изображение" />
        </form>

        {{-- Переносим кнопку внутрь формы через атрибут form --}}
        <x-slot name="footerSlot">
            <x-adminlte-button label="Создать" type="submit" theme="success" form="{{ $formId }}" />
        </x-slot>
    </x-adminlte-modal>
@endsection



{{-- Push extra CSS --}}

@push('css')

@endpush

{{-- Push extra scripts --}}

@push('js')
    <script>
    </script>
@endpush
