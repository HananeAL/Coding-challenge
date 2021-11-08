<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Validators\CategoryValidator;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $category = $this->categoryRepository->deleteById($id);

        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Unable to delete category data');
        }
        DB::commit();

        return $category;
    }
}
