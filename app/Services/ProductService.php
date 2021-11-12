<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Validators\ProductValidator;

class ProductService
{

    protected $productRepository;
    protected $productValidator;

    public function __construct(ProductRepository $productRepository, ProductValidator $productValidator)
    {
        $this->productRepository = $productRepository;
        $this->productValidator = $productValidator;
    }

    public function get()
    {
        return $this->productRepository->getAll();
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
