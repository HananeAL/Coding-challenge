<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Validators\CategoryValidator;
use InvalidArgumentException;

class CategoryService
{

    protected $categoryRepository;
    protected $categoryValidator;

    public function __construct(CategoryRepository $categoryRepository, CategoryValidator $categoryValidator)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryValidator = $categoryValidator;
    }

    public function get()
    {
        return $this->categoryRepository->getAll();
    }

    public function create(array $data)
    {
        $validator = $this->categoryValidator->validate($data);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        return $this->categoryRepository->save($data);
    }
}
