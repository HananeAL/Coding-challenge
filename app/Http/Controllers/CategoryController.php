<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends ApiController
{

    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $data = $this->categoryService->get();
        return $this->successResponse(200, $data);
    }

    public function store(Request $request)
    {
        $data = $this->categoryService->create($request->all());
        return $this->successResponse(200, $data);
    }

    public function destroy(Request $request)
    {
        $id = $request->route('category');
        $data = $this->categoryService->delete($id);
        return $this->successResponse(200, $data);
    }

}
