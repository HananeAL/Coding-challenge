<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository implements RepositoryInterface
{

    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getAll()
    {
        return $this->category->get();
    }

    public function get(array $conditions)
    {
        return $this->category->where($conditions)->first();
    }

    public function save(array $data)
    {
        return $this->category->create($data);
    }

    public function deleteById($id)
    {
        return $this->category->where('id', $id)->delete($id);
    }

}
