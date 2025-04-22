<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\StoreBrandRequest;
use App\Http\Requests\Admin\Brand\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::query()->paginate(10);

        return view('admin.brands.adminBrand', compact('brands'));
    }

    public function noPublished()
    {
        $brands = Brand::query()->where('published', false)->paginate(10);

        return view('admin.brands.adminBrandNoPublished', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $validated = $request->validated();

        $isPublic = $request->has('published') ? 1 : 0;
        $validated['published'] = $isPublic;

        // Генерация slug
        $validated['slug'] = Str::slug($validated['name']);

        // Проверка на уникальность и добавление суффикса при необходимости
        $originalSlug = $validated['slug'];
        $counter = 1;
        while (Brand::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $counter++;
        }

        // Обработка изображения
        if ($request->hasFile('image')) {
            $validated['image'] = "/storage/{$request->file('image')->store('brands', 'public')}";
        }

        $brand = Brand::query()->create($validated);

        return redirect()->back()
            ->with(['success' => "Каталог \"$brand->name\" успешно добавлен."]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $validated = $request->validated();

        $validated['published'] = $request->has('published') ? 1 : 0;

        // Генерация slug
        $slug = Str::slug($validated['name']);
        $originalSlug = $slug;
        $counter = 1;

        // Уникальность slug, исключая текущую запись
        while (Brand::where('slug', $slug)->where('id', '!=', $brand->id)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }
        $validated['slug'] = $slug;

        // Обновление изображения
        if ($request->hasFile('image')) {
            // Удаление старого файла, если нужно
            if ($brand->image && Storage::disk('public')->exists(str_replace('/storage/', '', $brand->image))) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $brand->image));
            }

            $path = $request->file('image')->store('brands', 'public');
            $validated['image'] = "/storage/$path";
        }

        $brand->update($validated);

        return redirect()->back()
            ->with('success', "Каталог \"$brand->name\" успешно обновлён.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->back()->with('success', 'Успешное удаление бренда');
    }
}
