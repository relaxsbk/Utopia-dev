<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $user = $request->user();
        $cart = $user->cart()->with('items.product')->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->back()->with('message_errors', 'Корзина пуста.');
        }

        $productsInput = $request->input('products', []);

        DB::beginTransaction();

        try {
            $paymentId = 1;
            $statusId = 1;

            $total = 0;

            foreach ($cart->items as $item) {
                $product = $item->product;

                if (!$product) {
                    throw new \Exception('Товар не найден.');
                }

                $requestedQuantity = isset($productsInput[$product->id]['quantity'])
                    ? max(1, (int) $productsInput[$product->id]['quantity'])
                    : $item->quantity;

                // Проверка доступного количества
                if ($requestedQuantity > $product->quantity) {
                    throw new \Exception("Недостаточно товара \"{$product->name}\" на складе. Доступно: {$product->quantity}");
                }

                $item->quantity = $requestedQuantity;
                $total += $product->priceDiscount() * $requestedQuantity;
            }

            $order = Order::create([
                'user_id' => $user->id,
                'payment_id' => $paymentId,
                'order_status_id' => $statusId,
                'total' => $total,
            ]);

            foreach ($cart->items as $item) {
                $product = $item->product;

                $order->items()->create([
                    'product_id' => $product->id,
                    'quantity' => $item->quantity,
                    'total' => $product->priceDiscount() * $item->quantity,
                ]);

                // Уменьшаем количество товара
                $product->decrement('quantity', $item->quantity);
            }

            // Очищаем корзину
            $cart->items()->delete();

            DB::commit();

            return redirect()->route('home')->with('success', 'Заказ успешно оформлен!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('message_errors', $e->getMessage());
        }
    }

}
