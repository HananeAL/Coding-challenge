<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\CategoryProductRepository;

class CategoryProductService
{
    protected $categoryProductRepository;

    public function __construct(CategoryProductRepository $categoryProductRepository)
    {
        $this->categoryProductRepository = $categoryProductRepository;
    }

    public function attachCategories(Product $product, array $categories)
    {
        return $this->categoryProductRepository->attachCategories($product, $categories);
    }
}
