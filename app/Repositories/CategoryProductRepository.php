<?php

namespace App\Repositories;

use App\Models\Product;

class CategoryProductRepository
{
    public function attachCategories(Product $product, array $categories)
    {
        return $product->categories()->attach($categories);
    }
}
