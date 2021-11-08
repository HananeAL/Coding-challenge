<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getAll()
    {
        return $this->category->all();
    }

    public function save($data)
    {
        return $this->category->create($data);
    }

    public function deleteById($id)
    {
        return $this->category->where('id', $id)->delete($id);
    }

}
