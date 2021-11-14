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

    public function __construct(
        ProductRepository $productRepository,
        ProductValidator $productValidator,
        CategoryService $categoryService) {

        $this->productRepository = $productRepository;
        $this->productValidator = $productValidator;
        $this->categoryService = $categoryService;

    }

    public function getProductsByCategory(String $categoryName = null)
    {
        if ($categoryName == null) {
            return ApiResponser::errorResponse(404, 'Parameter category name doesn\'t exist');
        }

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
        return $this->productRepository->save($data);
    }

    public function delete($id)
    {
        return $this->productRepository->deleteById($id);
    }
}
