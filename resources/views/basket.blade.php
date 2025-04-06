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
            -moz-appearance: textfield; /* для Firefox */
        }
    </style>
@endsection

@section('main')
    <div class="container my-5">
        <h2 class="mb-4">Корзина</h2>

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
                                    <a href="{{route('product.show', $item->product)}}" class="card-title fs-4 text-decoration-none text-black">{{ $item->product->name }}</a>
                                    <p class="card-text mb-1">Цена: <strong class="item-price">{{ $item->product->priceDiscount() }}</strong> ₽</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex align-items-center h-100 justify-content-center">
                                    <div class="input-group input-group-sm me-2" style="width: 110px;">
                                        <button class="btn btn-outline-secondary btn-minus" type="button">−</button>
                                        <input type="number"
                                               class="form-control text-center item-qty"
                                               value="{{ $item->quantity }}"
                                               min="1" step="int">
                                        <button class="btn btn-outline-secondary btn-plus" type="button">+</button>
                                    </div>
                                    <form method="POST" action="{{ route('removeFromCart', $item->product) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">Удалить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Корзина пуста</p>
                @endforelse
            </div>

            <div class="col-md-4">
                <div class="card p-3">
                    <h5 class="mb-3">Итог</h5>
                    <p>Товаров: <span id="total-items">{{ $cart->items->count() }}</span></p>
                    <p>Общая стоимость: <strong id="total-price">{{ $cart->items->sum(fn($item) => $item->product->priceDiscount() * $item->quantity) }}</strong> ₽</p>

                    <div class="form-check my-2">
                        <input class="form-check-input" type="checkbox" id="agreeCheckbox">
                        <label class="form-check-label" for="agreeCheckbox">
                            Я соглашаюсь с условиями оформления заказа
                        </label>
                    </div>

                    <button class="btn btn-primary w-100 mt-2" id="checkoutBtn" disabled>Оформить заказ</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateTotal() {
            let totalPrice = 0;
            let totalItems = 0;

            document.querySelectorAll('.card[data-price]').forEach(card => {
                const price = parseInt(card.getAttribute('data-price'));
                const qtyInput = card.querySelector('.item-qty');
                const quantity = parseInt(qtyInput.value);

                totalItems += quantity;
                totalPrice += price * quantity;
            });

            document.getElementById('total-price').textContent = totalPrice;
            document.getElementById('total-items').textContent = totalItems;
        }

        document.querySelectorAll('.btn-minus').forEach(button => {
            button.addEventListener('click', function () {
                const input = this.closest('.input-group').querySelector('.item-qty');
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                    updateTotal();
                }
            });
        });

        document.querySelectorAll('.btn-plus').forEach(button => {
            button.addEventListener('click', function () {
                const input = this.closest('.input-group').querySelector('.item-qty');
                input.value = parseInt(input.value) + 1;
                updateTotal();
            });
        });

        document.querySelectorAll('.item-qty').forEach(input => {
            input.addEventListener('change', updateTotal);
        });

        document.getElementById('agreeCheckbox').addEventListener('change', function () {
            document.getElementById('checkoutBtn').disabled = !this.checked;
        });

        updateTotal();
    </script>
@endsection
