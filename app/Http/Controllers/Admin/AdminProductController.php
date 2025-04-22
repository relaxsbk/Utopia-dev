<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();

        $products = Product::query()->paginate(15);

        return view('admin.products.adminProducts', compact('products', 'categories', 'brands'));
    }
    public function noPublished()
    {
        $categories = Category::all();
        $brands = Brand::all();

        $products = Product::query()->where('published', false)->paginate(15);

        return view('admin.products.adminProductsNoPublished', compact('products', 'categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric|min:0|max:100',
            'quantity' => 'required|integer|min:0',
            'published' => 'nullable|boolean',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $product = Product::create([
            'category_id' => $validated['category_id'],
            'brand_id' => $validated['brand_id'],
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
            'description' => $validated['description'],
            'price' => $validated['price'],
            'discount' => $validated['discount'] ?? 0,
            'quantity' => $validated['quantity'],
            'published' => $request->has('published'),
        ]);

        // Обработка изображений
        foreach ($request->file('images', []) as $position => $image) {
            $path = $image->store('products', 'public');
            $product->images()->create([
                'url' => "storage/$path",
                'position' => $position,
                'name' => $validated['name'],
            ]);
        }

        return redirect()->back()->with('success', 'Товар успешно создан');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();

        return view('admin.products.adminProduct', compact('product', 'brands', 'categories'));
    }


    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();
        $validated['published'] = $request->has('published');

        // Обновляем базовые поля
        $product->update($validated);

        // Работа с изображениями
        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $position => $image) {
                if (!$image) continue; // Пропускаем если файл не выбран

                $path = $image->store('products', 'public');

                // Ищем изображение с такой позицией
                $existingImage = $product->images()->where('position', $position)->first();

                if ($existingImage) {
                    // Удаляем старый файл, если он есть
                    if (Storage::disk('public')->exists(str_replace('/storage/', '', $existingImage->url))) {
                        Storage::disk('public')->delete(str_replace('/storage/', '', $existingImage->url));
                    }

                    // Обновляем ссылку
                    $existingImage->update([
                        'url' => '/storage/' . $path,
                    ]);
                } else {
                    // Создаем новое изображение
                    $product->images()->create([
                        'url' => '/storage/' . $path,
                        'position' => $position,
                        'name' => $validated['name'],
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Товар обновлен');
    }

//    public function update(Request $request, Product $product)
//    {
//        $validated = $request->validate([
//            'category_id' => 'required|exists:categories,id',
//            'name' => 'required|string|max:255',
//            'description' => 'nullable|string',
//            'published' => 'nullable|boolean',
//            'new_images.*' => 'nullable|image|max:2048',
//        ]);
//
//        $product->update([
//            'category_id' => $validated['category_id'],
//            'name' => $validated['name'],
//            'slug' => Str::slug($validated['name']),
//            'description' => $validated['description'] ?? null,
//            'published' => $validated['published'] ?? false,
//        ]);
//
//        // Обработка изображений по позициям
//        if ($request->hasFile('new_images')) {
//            foreach ($request->file('new_images') as $position => $image) {
//                $existingImage = $product->images()->where('position', $position)->first();
//
//                // Сохраняем новое изображение
//                $path = $image->store('products', 'public');
//                $url = "storage/$path";
//
//                if ($existingImage) {
//                    // Удаляем старый файл (если хочешь)
//                    if (Storage::disk('public')->exists(str_replace('storage/', '', $existingImage->url))) {
//                        Storage::disk('public')->delete(str_replace('storage/', '', $existingImage->url));
//                    }
//
//                    // Обновляем запись
//                    $existingImage->update([
//                        'url' => $url,
//                        'name' => $validated['name'],
//                    ]);
//                } else {
//                    // Создаём новую запись
//                    $product->images()->create([
//                        'url' => $url,
//                        'name' => $validated['name'],
//                        'position' => $position,
//                    ]);
//                }
//            }
//        }
//
//        return redirect()->back()->with('success', 'Товар обновлён');
//    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->with('success', 'Успешное удаление товара');
    }
}
