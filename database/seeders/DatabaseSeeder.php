<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Catalog;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Создаём бренды
        $brands = Brand::factory(5)->create();

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
