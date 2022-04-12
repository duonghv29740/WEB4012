<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\News;
use App\Models\Product;
use App\Models\ProductNews;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Category::factory(10)->create();
        Product::factory(1000)->create();
        CategoryProduct::factory(10)->create();
        News::factory(100)->create();
        ProductNews::factory(500)->create();
        User::factory(2)->create();
    }
}
