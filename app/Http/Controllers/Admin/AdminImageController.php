<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminImageController extends Controller
{

    public function update(Request $request, Product $product)
    {
        foreach ($request->file('new_images', []) as $position => $file) {
            if ($file && $file->isValid()) {
                $path = $file->store("products", 'public');

                $product->images()->create([
                    'url' => "storage/$path",
                    'position' => $position,
                    'name' => 'name'
                ]);
            }
        }

        return back()->with('success', 'Изображения успешно загружены.');
    }
    public function destroy(Image $image)
    {
        // Удаление файла
        Storage::disk('public')->delete($image->url);
        $image->delete();

        return back()->with('success', 'Изображение удалено.');
    }
}
