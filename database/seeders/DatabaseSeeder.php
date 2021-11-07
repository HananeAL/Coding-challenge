<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // set foreign key check to zero
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Product::truncate();
        Category::truncate();
        DB::table('category_product')->truncate();

        Category::factory()->count(3)->create()->each(
            function ($category) {
                $category->parent()->associate(Category::inRandomOrder()->first()->id);
                $category->save();
            }
        );

        Product::factory()->count(3)->create()->each(
            function ($product) {
                $categories = Category::all()->random()->pluck('id');
                $product->categories()->attach($categories);
            }
        );
    }
}
