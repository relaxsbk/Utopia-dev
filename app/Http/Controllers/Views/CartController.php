<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = auth()->user()->cart()->with('items.product.brand')->first();

        return view('basket', compact('cart'));
    }

    public function addToCart(Request $request, Product $product)
    {
        $user = $request->user();

        // Получаем или создаем корзину
        $cart = $user->cart()->firstOrCreate([
            'user_id' => $user->id
        ], [
            'total' => 0,
        ]);

        // Проверяем, есть ли уже товар в корзине
        $item = $cart->items()->where('product_id', $product->id)->first();

        if ($item) {
            $item->quantity += 1;
            $item->total = $product->priceDiscount() * $item->quantity;
            $item->save();
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => 1,
                'total' => $product->priceDiscount(),
            ]);
        }

        // Обновляем общую сумму корзины
        $cart->total = $cart->items->sum('total');
        $cart->save();

        return back()->with('success', 'Товар добавлен в корзину');
    }

    public function removeFromCart(Request $request, Product $product)
    {
        $user = $request->user();

        $cart = $user->cart;

        if ($cart) {
            $cart->items()->where('product_id', $product->id)->delete();

            // обновим сумму
            $cart->total = $cart->items->sum('total');
            $cart->save();
        }

        return back()->with('success', 'Товар удалён из корзины');
    }

}
