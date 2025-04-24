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
                        <x-adminlte-button label="Удалить" data-toggle="modal" data-target="#deleteModal-{{ $user->id }}" class="btn btn-sm btn-danger" />
                    </td>
                </tr>



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

@endsection



{{-- Push extra CSS --}}

@push('css')

@endpush

{{-- Push extra scripts --}}

@push('js')
    <script>
    </script>
@endpush
