@extends('layouts.main')
@section('title', 'Корзина')

@section('style')
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
@endsection

@section('main')
    <div class="container mb-4 mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item p-0 m-0">
                    <a href="{{route('home')}}">Главная</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Корзина
                </li>

            </ol>
        </nav>
    </div>

    <div class="container">

        <h2 class="mb-4">Корзина</h2>

        <form method="POST" action="{{ route('checkout') }}">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    @forelse ($cart?->items as $item)
                        <div class="card mb-3" data-price="{{ $item->product->priceDiscount() }}">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-3">
                                    <img src="{{ asset('storage/static/photo/мягкая-игрушка-2-1.png') }}"
                                         class="img-fluid rounded-start p-2"
                                         style="width: auto; height: 10rem"
                                         alt="{{ $item->product->name }}">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <a href="{{ route('product.show', $item->product) }}"
                                           class="card-title fs-4 text-decoration-none text-black">
                                            {{ $item->product->name }}
                                        </a>
                                        <p class="card-text mb-1">
                                            Цена: <strong class="item-price">{{ $item->product->priceDiscount() }}</strong> ₽
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="d-flex align-items-center h-100 justify-content-center">
                                        <div class="input-group input-group-sm me-2" style="width: 110px;">
                                            <button class="btn btn-outline-secondary btn-minus" type="button">−</button>
                                            <input type="number"
                                                   class="form-control text-center item-qty"
                                                   value="{{ $item->quantity }}"
                                                   min="1"
                                                   step="1">
                                            <button class="btn btn-outline-secondary btn-plus" type="button">+</button>
                                        </div>

                                        {{-- Скрытые поля для передачи данных в контроллер --}}
                                        <input type="hidden" name="products[{{ $item->product_id }}][id]" value="{{ $item->product_id }}">
                                        <input type="hidden" class="hidden-qty" name="products[{{ $item->product_id }}][quantity]" value="{{ $item->quantity }}">

                                        {{-- Форма удаления товара из корзины, отделена от основной формы --}}
                                        <div class="ms-2">
                                            <a href="{{route('removeFromCart', $item->product)}}" class="btn btn-sm btn-outline-danger ms-2">Удалить</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="fs-4">Вы пока ничего не добавили в корзину 😥</p>
                    @endforelse
                </div>

                <div class="col-md-4">
                    <div class="card p-3">
                        <h5 class="mb-3">Итог</h5>
                        <p>Товаров: <span id="total-items">{{ $cart->items->sum('quantity') }}</span></p>
                        <p>Общая стоимость:
                            <strong id="total-price">
                                {{ $cart->items->sum(fn($item) => $item->product->priceDiscount() * $item->quantity) }}
                            </strong> ₽
                        </p>

                        <div class="form-check my-2">
                            <input class="form-check-input" type="checkbox" id="agreeCheckbox">
                            <label class="form-check-label" for="agreeCheckbox">
                                Я соглашаюсь с условиями оформления заказа
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-2" id="checkoutBtn" disabled>
                            Оформить заказ
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        function updateTotal() {
            let totalPrice = 0;
            let totalItems = 0;

            document.querySelectorAll('.card[data-price]').forEach((card, index) => {
                const price = parseInt(card.getAttribute('data-price'));
                const qtyInput = card.querySelector('.item-qty');
                const hiddenQty = card.querySelector('.hidden-qty');
                const quantity = parseInt(qtyInput.value);

                totalItems += quantity;
                totalPrice += price * quantity;

                if (hiddenQty) {
                    hiddenQty.value = quantity;
                }
            });

            document.getElementById('total-price').textContent = totalPrice;
            document.getElementById('total-items').textContent = totalItems;
        }

        document.querySelectorAll('.btn-minus').forEach(button => {
            button.addEventListener('click', function () {
                const input = this.closest('.input-group').querySelector('.item-qty');
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                    input.dispatchEvent(new Event('input'));
                }
            });
        });

        document.querySelectorAll('.btn-plus').forEach(button => {
            button.addEventListener('click', function () {
                const input = this.closest('.input-group').querySelector('.item-qty');
                input.value = parseInt(input.value) + 1;
                input.dispatchEvent(new Event('input'));
            });
        });

        document.querySelectorAll('.item-qty').forEach(input => {
            input.addEventListener('input', updateTotal);
        });

        document.getElementById('agreeCheckbox').addEventListener('change', function () {
            document.getElementById('checkoutBtn').disabled = !this.checked;
        });

        updateTotal();
    </script>
@endsection
