@extends('layouts.admin')

@section('subtitle', 'Welcome')
@section('content_header_title', 'Административная панель')
@section('content_header_subtitle', 'КАТАЛОГ')

{{-- Content body: main page content --}}

@section('content_body')
    @php
        $heads = [
            '#',
            'Название',
            'Описание',
            'Дата создания',
            'Публикация',
            ['label' => 'Действия', 'no-export' => true, 'width' => 20],
        ];
    @endphp

    <x-adminlte-datatable id="catalogTable" :heads="$heads" striped hoverable bordered compressed>
        @foreach ($catalogs as $catalog)
            <tr>
                <td>{{ $catalog->id }}</td>
                <td>{{ $catalog->name }}</td>
                <td>{{ $catalog->description }}</td>
                <td>{{ $catalog->created_at->format('d.m.Y H:i') }}</td>
                <td>{{ $catalog->published}}</td>
                <td>
                    <a href="{{ route('admin.catalog.edit', $catalog) }}" class="btn btn-sm btn-primary">
                        Редактировать
                    </a>
                </td>
            </tr>
        @endforeach
    </x-adminlte-datatable>

    <div class="mt-3">
        {{ $catalogs->links() }}
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
