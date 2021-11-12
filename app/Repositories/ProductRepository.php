<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAll()
    {
        return $this->product->all();
    }

    public function save($data)
    {
        return $this->product->create($data);
    }

    public function deleteById($id)
    {
        return $this->product->where('id', $id)->delete($id);
    }

}
