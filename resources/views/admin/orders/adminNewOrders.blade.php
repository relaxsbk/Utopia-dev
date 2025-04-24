@extends('layouts.admin')

@section('subtitle', 'Заказы')
@section('content_header_title', 'Административная панель')
@section('content_header_subtitle', 'Заказы')

{{-- Content body: main page content --}}

@section('content_body')
    @php
        $heads = ['#', 'Пользователь', 'Товары', 'Общая сумма', 'Статус', ['label' => 'Действия', 'width' => 20]];
    @endphp

    @if($orders->isNotEmpty())
        <x-adminlte-datatable id="ordersTable" :heads="$heads" striped hoverable bordered compressed>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td><a href="{{route('admin.users.show', $order->user)}}">
                            {{ $order->user->email }}
                        </a></td>
                    <td>
                        <ul class="list-unstyled mb-0">
                            @foreach($order->items as $item)
                                <li>{{ $item->product->name }} x {{ $item->quantity }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ number_format($order->total, 2, ',', ' ') }} ₽</td>
                    <td>
                        <form method="POST" action="{{ route('admin.orders.updateStatus', $order) }}">
                            @csrf
                            @method('PUT')
                            <div class="input-group">
                                <x-adminlte-select class="form-select " name="status" onchange="this.form.submit()">

                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}" {{ $order->order_status_id === $status->id ? 'selected' : '' }}>{{ $status->label }}</option>
                                    @endforeach
                                </x-adminlte-select>
                            </div>
                        </form>
                    </td>
                    <td>
                        {{-- Опционально — кнопки для просмотра/редактирования --}}
                        <x-adminlte-button label="Подробнее" data-toggle="modal" data-target="#orderModal-{{ $order->id }}" class="btn btn-info" />
                    </td>
                </tr>

                {{-- Модалка с деталями заказа --}}
                <x-adminlte-modal id="orderModal-{{ $order->id }}" title="Заказ №{{ $order->id }}" size="lg" icon="fas fa-box">
                    <x-adminlte-card theme="primary"  title="Информация о заказе" icon="fas fa-info-circle" class="mb-2">
                        <p><strong>Дата:</strong> {{ $order->created_at->format('d.m.Y H:i') }}</p>
                        <p><strong>Пользователь:</strong> <a href="{{ route('admin.users.show', $order->user) }}">{{ $order->user->email }}</a></p>
                        <p><strong>Статус:</strong> {{ $order->orderStatus->label ?? 'Неизвестно' }}</p>
                    </x-adminlte-card>
                    <x-adminlte-card theme="primary" title="Товары" icon="fas fa-book" class="mb-2">
                        @foreach($order->items as $item)
                            <p class="mb-2">{{ $item->product->name }} — {{ $item->quantity }} шт. — {{ $item->total }} ₽.</p>
                        @endforeach
                    </x-adminlte-card>
                    <div class="d-flex justify-content-end">
                        <div class="text-right">
                            <h5 class="font-weight-bold">
                                Общая сумма заказа: <span class="text-success">{{ number_format($order->total, 2, ',', ' ') }} ₽</span>
                            </h5>
                        </div>
                    </div>
                </x-adminlte-modal>
            @endforeach
        </x-adminlte-datatable>

        <div class="mt-3">
            {{ $orders->links('pagination::bootstrap-5') }}
        </div>
    @else
        <h4>Новых заказов пока нет 😔</h4>
    @endif
@endsection



{{-- Push extra CSS --}}

@push('css')

@endpush

{{-- Push extra scripts --}}

@push('js')
    <script>
    </script>
@endpush
