<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\FavoriteItem;
use App\Models\Product;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function addToFavorite(Request $request, Product $product)
    {
        $user = $request->user();

        // Получаем или создаем "избранное" пользователя
        $favorite = Favorite::firstOrCreate([
            'user_id' => $user->id,
        ]);

        // Проверяем, не добавлен ли уже товар
        $exists = FavoriteItem::where('favorite_id', $favorite->id)
            ->where('product_id', $product->id)
            ->exists();

        if (!$exists) {
            FavoriteItem::create([
                'favorite_id' => $favorite->id,
                'user_id' => $user->id,
                'product_id' => $product->id,
            ]);
        }

        return back()->with('success', 'Товар добавлен в избранное');
    }

    public function removeFromFavorites(Request $request, Product $product)
    {
        $user = $request->user();

        $favorite = Favorite::where('user_id', $user->id)->first();

        if ($favorite) {
            FavoriteItem::where('favorite_id', $favorite->id)
                ->where('product_id', $product->id)
                ->delete();
        }

        return back()->with('success', 'Товар удален из избранного');
    }
}
