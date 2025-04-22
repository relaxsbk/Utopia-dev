@extends('layouts.admin')

@section('subtitle', 'Бренды')
@section('content_header_title', 'Административная панель')
@section('content_header_subtitle', 'Неопубликованные бренды')

{{-- Content body: main page content --}}

@section('content_body')
    @php
        $heads = [
            '#',
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
    @if($brands->isNotEmpty())
        <x-adminlte-datatable id="catalogTable" :heads="$heads" striped hoverable bordered compressed>
            @foreach ($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>

                        <img style="width: auto; height: 50px;" src="{{asset($brand->image)}}" alt="da" >
                    </td>
                    <td>{{ $brand->name }}</td>
                    <td>{{ $brand->description }}</td>
                    <td>{{ $brand->created_at->format('d.m.Y H:i') }}</td>
                    <td>{{ $brand->published ? 'Да' : 'Нет' }}</td>
                    <td>
                        <x-adminlte-button label="Редактировать" data-toggle="modal" data-target="#editModal-{{ $brand->id }}" class="btn btn-sm btn-primary" />
                        <x-adminlte-button label="Удалить" data-toggle="modal" data-target="#deleteModal-{{ $brand->id }}" class="btn btn-sm btn-danger" />
                    </td>
                </tr>

                {{-- Модалка редактирования --}}
                <x-adminlte-modal id="editModal-{{ $brand->id }}" title="Редактировать: {{ $brand->name }}" theme="primary" icon="fas fa-edit" size="lg" scrollable>
                    <form method="POST" id="edit-{{ $brand->id }}" action="{{ route('admin.brand.update', $brand) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <x-adminlte-input name="name" label="Название" value="{{ $brand->name }}" />
                        <x-adminlte-textarea name="description" label="Описание">{{ $brand->description }}</x-adminlte-textarea>


                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="published" id="published-{{ $brand->id }}" {{ $brand->published ? 'checked' : '' }}>
                                <label class="form-check-label" for="published-{{ $brand->id }}">
                                    Опубликован
                                </label>
                            </div>
                        </div>

                        <div class="mb-2">
                            <label>Текущее изображение:</label><br>
                            <img src="{{ $brand->image }}" alt="Image" style="max-width: 150px; max-height: 150px;">
                        </div>

                        <x-adminlte-input-file name="image" label="Новое изображение" />

                        <x-slot name="footerSlot">
                            <x-adminlte-button label="Сохранить" type="submit" theme="primary" form="edit-{{ $brand->id }}" />
                        </x-slot>
                    </form>
                </x-adminlte-modal>

                {{-- Модалка удаления --}}
                <x-adminlte-modal id="deleteModal-{{ $brand->id }}" title="Удалить: {{ $brand->name }}" theme="danger" icon="fas fa-trash">
                    <form method="POST" id="delete-{{ $brand->id }}" action="{{ route('admin.brand.destroy', $brand) }}">
                        @csrf
                        @method('DELETE')

                        <p>Вы уверены, что хотите удалить <strong>{{ $brand->name }}</strong>?</p>

                        <x-slot name="footerSlot">
                            <x-adminlte-button label="Удалить" type="submit" theme="danger" form="delete-{{ $brand->id }}" />
                        </x-slot>
                    </form>
                </x-adminlte-modal>
            @endforeach
        </x-adminlte-datatable>
    @else
        <h2>Записей пока нет 😥</h2>
    @endif

    <div class="mt-3">
        {{ $brands->links('pagination::bootstrap-5') }}
    </div>

    {{-- Модалка создания новой записи --}}
    <x-adminlte-modal id="createModal" title="Добавить новый бренд" theme="success" icon="fas fa-plus" size="lg" scrollable>
        @php $formId = 'create-catalog-form'; @endphp

        <form id="{{ $formId }}" method="POST" action="{{ route('admin.brand.store') }}" enctype="multipart/form-data">
            @csrf

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
