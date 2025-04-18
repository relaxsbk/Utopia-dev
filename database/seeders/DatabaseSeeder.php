<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Catalog;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Создаём бренды
        $brandsData = [
            ['name' => 'Жирафики', 'image' => '/storage/static/photo/brands/лого_жирафики.png', 'description' => 'Крутые жирафики'],
            ['name' => 'Умка', 'image' => '/storage/static/photo/brands/лого_умка.png', 'description' => 'Умка'],
            ['name' => 'Step Puzzle', 'image' => '/storage/static/photo/brands/лого_степ.png', 'description' => 'пазлы'],
            ['name' => 'НОРDПЛАСТ', 'image' => '/storage/static/photo/brands/лого_норпалис.png', 'description' => 'нордпласт'],
            ['name' => 'Lori', 'image' => '/storage/static/photo/brands/лого_lori.png', 'description' => 'Лори'],
            ['name' => 'Весна', 'image' => '/storage/static/photo/brands/лого_весна.png', 'description' => 'Весна'],
        ];

        $brands = collect();

        foreach ($brandsData as $brandData) {
            $brands->push(
                Brand::create([
                    'name' => $brandData['name'],
                    'slug' => Str::slug($brandData['name']),
                    'description' => $brandData['description'],
                    'image' => $brandData['image'], // путь относительно storage/public
                    'published' => true,
                ])
            );
        }

        // Каталоги
        $catalogs = [
            ['name' => 'Ясель', 'slug' => 'nursery', 'description' => 'Игрушки для самых маленьких', 'image' => 'http://yao.goguynet.jp/wp-content/uploads/sites/17/2017/12/840945.jpg'],
            ['name' => 'Дошкольники', 'slug' => 'preschoolers', 'description' => 'Игры для детей по старше', 'image' => 'https://img.freepik.com/premium-vector/kids-playing-entertaining-moments-vector-illustration_1253202-216205.jpg?semt=ais_hybrid'],
            ['name' => 'Школьники', 'slug' => 'schoolchildren', 'description' => 'Игры для развития ума', 'image' => 'https://avatars.mds.yandex.net/i?id=01aa3790705b3d460ab0434314f57c0a_l-7552315-images-thumbs&n=13'],
        ];

        foreach ($catalogs as $catalogData) {
            $catalog = Catalog::create([
                'name' => $catalogData['name'],
                'slug' => $catalogData['slug'],
                'description' => $catalogData['description'],
                'image' => $catalogData['image'],
                'published' => true,
            ]);

            // Категории для каждого каталога
            for ($i = 1; $i <= 3; $i++) {
                $category = Category::create([
                    'name' => $catalog->name . " Категория $i",
                    'slug' => $catalog->slug . "-category-$i",
                    'description' => "Описание категории $i",
                    'image' => fake()->imageUrl(),
                    'published' => true,
                    'catalog_id' => $catalog->id,
                ]);

                // Продукты для каждой категории
                Product::factory(5)->create([
                    'category_id' => $category->id,
                    'brand_id' => $brands->random()->id,
                ]);
            }
        }
    }


        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

}
