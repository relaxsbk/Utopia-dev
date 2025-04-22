<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;
use App\Models\Catalog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()->paginate(10);
        $catalogs = Catalog::all();
        return view('admin.categories.adminCategory', compact('categories', 'catalogs'));
    }


    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

//        dd($validated);

        $validated['published'] = $request->has('published');

        // Генерация slug
        $validated['slug'] = Str::slug($validated['name']);

        // Проверка на уникальность и добавление суффикса при необходимости
        $originalSlug = $validated['slug'];
        $counter = 1;
        while (Category::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $counter++;
        }

        if ($request->hasFile('image')) {
            $validated['image'] = "/storage/{$request->file('image')->store('category', 'public')}";
        }

        Category::create($validated);

        return redirect()->back()->with('success', 'Категория добавлена');
    }

    public function noPublished()
    {
        $categories = Category::query()->where('published', false)->paginate(10);
        $catalogs = Catalog::all();
        return view('admin.categories.adminCategory', compact('categories', 'catalogs'));
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        $validated['published'] = $request->has('published');

        // Обновление slug только если изменилось имя
        if ($category->name !== $validated['name']) {
            $validated['slug'] = Str::slug($validated['name']);
            $originalSlug = $validated['slug'];
            $counter = 1;

            while (
            Category::where('slug', $validated['slug'])
                ->where('id', '!=', $category->id)
                ->exists()
            ) {
                $validated['slug'] = $originalSlug . '-' . $counter++;
            }
        }

        if ($request->hasFile('image')) {
            if ($category->image && Storage::disk('public')->exists(str_replace('/storage/', '', $category->image))) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $category->image));
            }

            $path = $request->file('image')->store('category', 'public');
            $validated['image'] = "/storage/$path";
        }

        $category->update($validated);

        return redirect()->back()->with('success', 'Категория обновлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->with('success', 'Категория успешно удалена');
    }
}
