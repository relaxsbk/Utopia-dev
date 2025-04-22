<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class AdminImageController extends Controller
{

    public function destroy(Image $image)
    {
        // Удаление файла
        Storage::disk('public')->delete($image->url);
        $image->delete();

        return back()->with('success', 'Изображение удалено.');
    }
}
