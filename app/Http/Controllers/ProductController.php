<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Utils\ImageFile;
use Illuminate\Http\Request;

class ProductController extends ApiController
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $data = $this->productService->get();
        return $this->successResponse(200, $data);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $img = $request->file('image');
        $data['image'] = ImageFile::makeImage($img);

        $data = $this->productService->create($data);
        return $this->successResponse(200, $data);
    }

    public function destroy(Request $request)
    {
        $id = $request->route('product');
        $data = $this->productService->delete($id);
        return $this->successResponse(200, $data);
    }
}
