<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{

    public function rules(): array
    {
        return [
        'name' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
        'category_id' => ['required', 'exists:categories,id'],
        'brand_id' => ['required', 'exists:brands,id'],
        'price' => ['required', 'numeric', 'min:0'],
        'discount' => ['nullable', 'numeric', 'min:0', 'max:100'],
        'quantity' => ['required', 'integer', 'min:0'],
        'published' => ['sometimes'],

        // Каждое изображение необязательно, но если есть — должно быть изображением
        'new_images' => ['nullable', 'array'],
        'new_images.*' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ];
    }
}
