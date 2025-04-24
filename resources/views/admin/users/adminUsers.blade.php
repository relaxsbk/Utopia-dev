@extends('layouts.admin')

@section('subtitle', 'Welcome')
@section('content_header_title', 'Административная панель')
@section('content_header_subtitle', 'КАТАЛОГ')

{{-- Content body: main page content --}}

@section('content_body')
    @php
        $heads = [
            '#',
            'Имя',
            'Фамилия',
            'Телефон',
            'Роль',
            'Почта',
            'Подтверждение почты',
            ['label' => 'Действия', 'no-export' => true, 'width' => 20],
        ];
    @endphp

    {{-- Кнопка добавления новой записи --}}
{{--    <div class="d-flex justify-content-end mb-3">--}}
{{--        <x-adminlte-button label="Добавить" data-toggle="modal" data-target="#createModal" class="btn btn-success" />--}}
{{--    </div>--}}

    {{-- Таблица --}}
    @if($users->isNotEmpty())
        <x-adminlte-datatable id="catalogTable" :heads="$heads" striped hoverable bordered compressed>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->firstName }}</td>
                    <td>{{ $user->lastName }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->phone }} РОЛЬ</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->email_verified_at ? $user->email_verified_at->format('d.m.Y H:i') : 'Ещё не подтвердил' }}</td>

                    <td>
                        <a class="btn btn-sm btn-outline-secondary" href="{{route('admin.users.show', $user)}}">
                            <i class="fas fa-eye"></i>
                        </a>
{{--                        <x-adminlte-button label="Редактировать" data-toggle="modal" data-target="#editModal-{{ $catalog->id }}" class="btn btn-sm btn-primary" />--}}
                        <x-adminlte-button label="Удалить" data-toggle="modal" data-target="#deleteModal-{{ $user->id }}" class="btn btn-sm btn-danger" />
                    </td>
                </tr>

                {{-- Модалка редактирования --}}
{{--                <x-adminlte-modal id="editModal-{{ $catalog->id }}" title="Редактировать: {{ $catalog->name }}" theme="primary" icon="fas fa-edit" size="lg" scrollable>--}}
{{--                    <form method="POST" id="edit-{{ $catalog->id }}" action="{{ route('admin.catalog.update', $catalog) }}" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        @method('PUT')--}}

{{--                        <x-adminlte-input name="name" label="Название" value="{{ $catalog->name }}" />--}}
{{--                        <x-adminlte-textarea name="description" label="Описание">{{ $catalog->description }}</x-adminlte-textarea>--}}

{{--                        <div class="form-group">--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input" type="checkbox" name="published" id="published-{{ $catalog->id }}" {{ $catalog->published ? 'checked' : '' }}>--}}
{{--                                <label class="form-check-label" for="published-{{ $catalog->id }}">--}}
{{--                                    Опубликован--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="mb-2">--}}
{{--                            <label>Текущее изображение:</label><br>--}}
{{--                            <img src="{{ $catalog->image }}" alt="Image" style="max-width: 150px; max-height: 150px;">--}}
{{--                        </div>--}}

{{--                        <x-adminlte-input-file name="image" label="Новое изображение" />--}}

{{--                        --}}{{--                    <div class="modal-footer">--}}
{{--                        --}}{{--                        <x-adminlte-button label="Сохранить" type="submit" theme="primary" />--}}
{{--                        --}}{{--                    </div>--}}
{{--                        <x-slot name="footerSlot">--}}
{{--                            <x-adminlte-button label="Сохранить" type="submit" theme="primary" form="edit-{{ $catalog->id }}" />--}}
{{--                        </x-slot>--}}
{{--                    </form>--}}
{{--                </x-adminlte-modal>--}}

                {{-- Модалка удаления --}}
                <x-adminlte-modal id="deleteModal-{{ $user->id }}" title="Удалить: {{ $user->email }}" theme="danger" icon="fas fa-trash">
                    <form method="POST" id="delete-{{ $user->id }}" action="{{ route('admin.users.destroy', $user) }}">
                        @csrf
                        @method('DELETE')

                        <p>Вы уверены, что хотите удалить пользователя <strong>{{ $user->email }}</strong>?</p>

                        <x-slot name="footerSlot">
                            <x-adminlte-button label="Удалить" type="submit" theme="danger" form="delete-{{ $user->id }}" />
                        </x-slot>
                    </form>
                </x-adminlte-modal>
            @endforeach
        </x-adminlte-datatable>
    @else
        <h2>Записей пока нет 😥</h2>
    @endif

    <div class="mt-3">
        {{ $users->links('pagination::bootstrap-5') }}
    </div>

    {{-- Модалка создания новой записи --}}
{{--    <x-adminlte-modal id="createModal" title="Добавить новый каталог" theme="success" icon="fas fa-plus" size="lg" scrollable>--}}
{{--        @php $formId = 'create-catalog-form'; @endphp--}}

{{--        <form id="{{ $formId }}" method="POST" action="{{ route('admin.catalog.store') }}" enctype="multipart/form-data">--}}
{{--            @csrf--}}

{{--            <x-adminlte-input name="name" label="Название" />--}}
{{--            <x-adminlte-textarea name="description" label="Описание"></x-adminlte-textarea>--}}
{{--            <div class="form-group">--}}
{{--                <div class="form-check">--}}
{{--                    <input class="form-check-input" type="checkbox" name="published" id="published">--}}
{{--                    <label class="form-check-label" for="published">--}}
{{--                        Опубликован--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <x-adminlte-input-file name="image" label="Изображение" />--}}
{{--        </form>--}}

{{--        --}}{{-- Переносим кнопку внутрь формы через атрибут form --}}
{{--        <x-slot name="footerSlot">--}}
{{--            <x-adminlte-button label="Создать" type="submit" theme="success" form="{{ $formId }}" />--}}
{{--        </x-slot>--}}
{{--    </x-adminlte-modal>--}}
@endsection



{{-- Push extra CSS --}}

@push('css')

@endpush

{{-- Push extra scripts --}}

@push('js')
    <script>
    </script>
@endpush
