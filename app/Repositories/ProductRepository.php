<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;

class ProductRepository
{

    protected $product;
    protected $per_page = 3;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getProductsByCategory(Category $category)
    {
        $products = $category->products();
        return $products->filter()->paginate($this->per_page);
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
