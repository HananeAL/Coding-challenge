<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Traits\ApiResponser;
use App\Validators\ProductValidator;

class ProductService
{

    protected $productRepository;
    protected $productValidator;
    protected $categoryService;
    protected $categoryProductService;

    public function __construct(
        ProductRepository $productRepository,
        ProductValidator $productValidator,
        CategoryService $categoryService,
        CategoryProductService $categoryProductService) {

        $this->productRepository = $productRepository;
        $this->productValidator = $productValidator;
        $this->categoryService = $categoryService;
        $this->categoryProductService = $categoryProductService;

    }

    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function getProductsByCategory(String $categoryName = null)
    {
        $catName = ['name' => $categoryName];
        $category = $this->categoryService->get($catName);
        if (!$category) {
            return ApiResponser::errorResponse(404, 'this category not found');
        }
        return $this->productRepository->getProductsByCategory($category);
    }

    public function create(array $data)
    {
        $this->productValidator->validate($data);
        $product = $this->productRepository->save($data);

        $categories = $data['categories'];
        $this->categoryProductService->attachCategories($product, $categories);

        return $product;
    }

    public function delete($id)
    {
        return $this->productRepository->deleteById($id);
    }
}
