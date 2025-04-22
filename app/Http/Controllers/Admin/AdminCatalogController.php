<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCatalogRequest;
use App\Http\Requests\Admin\UpdateCatalogRequest;
use App\Models\Catalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminCatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogs = Catalog::paginate(10);

        return view('admin.catalog.adminCatalog', compact('catalogs'));
    }


    public function store(StoreCatalogRequest $request)
    {
        $validated = $request->validated();

        $isPublic = $request->has('published') ? 1 : 0;
        $validated['published'] = $isPublic;

        // Генерация slug
        $validated['slug'] = Str::slug($validated['name']);

        // Проверка на уникальность и добавление суффикса при необходимости
        $originalSlug = $validated['slug'];
        $counter = 1;
        while (Catalog::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $counter++;
        }

        // Обработка изображения
        if ($request->hasFile('image')) {
            $validated['image'] = "/storage/{$request->file('image')->store('catalog/images', 'public')}";
        }

        $catalog = Catalog::query()->create($validated);

        return redirect()->back()
            ->with(['success' => "Каталог \"$catalog->name\" успешно добавлен."]);
    }

    /**
     * Display the specified resource.
     */
    public function noPublished()
    {
        $catalogs = Catalog::query()->where('published', false)->paginate(10);

        return view('admin.catalog.adminNoPublishCatalog', compact('catalogs'));
    }


    public function update(UpdateCatalogRequest $request, Catalog $catalog)
    {
        $validated = $request->validated();

        $validated['published'] = $request->has('published') ? 1 : 0;

        // Генерация slug
        $slug = Str::slug($validated['name']);
        $originalSlug = $slug;
        $counter = 1;

        // Уникальность slug, исключая текущую запись
        while (Catalog::where('slug', $slug)->where('id', '!=', $catalog->id)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }
        $validated['slug'] = $slug;

        // Обновление изображения
        if ($request->hasFile('image')) {
            // Удаление старого файла, если нужно
            if ($catalog->image && Storage::disk('public')->exists(str_replace('/storage/', '', $catalog->image))) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $catalog->image));
            }

            $path = $request->file('image')->store('catalog/images', 'public');
            $validated['image'] = "/storage/$path";
        }

        $catalog->update($validated);

        return redirect()->back()
            ->with('success', "Каталог \"$catalog->name\" успешно обновлён.");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Catalog $catalog)
    {
        $catalog->delete();

        return redirect()->back()->with('success', 'Категория успешно удалена');
    }
}
