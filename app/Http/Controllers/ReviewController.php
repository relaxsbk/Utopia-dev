<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request)
    {
         $validated = $request->validated();
//        Review::query()->create($validated);

        $request->user()->reviews()->create($validated);

        $product = Product::findOrFail($request->product_id);
        $averageRating = $product->reviews()->avg('rating');
        $product->rating = $averageRating;
        $product->save();

        return redirect()->back()->with(['success' => 'Отзыв создан']);
    }
}
