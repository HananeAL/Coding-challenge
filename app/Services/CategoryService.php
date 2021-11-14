<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Validators\CategoryValidator;

class CategoryService
{

    protected $categoryRepository;
    protected $categoryValidator;

    public function __construct(CategoryRepository $categoryRepository, CategoryValidator $categoryValidator)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryValidator = $categoryValidator;
    }

    public function get(array $condition = [])
    {
        return $this->categoryRepository->get($condition);
    }

    public function create(array $data)
    {
        $this->categoryValidator->validate($data);
        return $this->categoryRepository->save($data);
    }

    public function delete($id)
    {
        return $this->categoryRepository->deleteById($id);
    }
}
