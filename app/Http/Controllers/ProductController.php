<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Traits\ApiResponser;
use App\Utils\ImageFile;
use Illuminate\Http\Request;

class ProductController extends ApiController
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $category = $request->query('category');

        if (empty($category)) {
            $products = $this->productService->getAll();
        } else {
            $products = $this->productService->getProductsByCategory($category);
        }

        if ($products->isEmpty()) {
            return ApiResponser::successResponse(200, 'Product(s) not found');
        }
        return $products;
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $img = $request->file('image');
        $data['image'] = ImageFile::makeImage($img);

        $data = $this->productService->create($data);
        return $data['categories'];
    }

    public function destroy(Request $request)
    {
        $id = $request->route('product');
        $data = $this->productService->delete($id);
        return $this->successResponse(200, $data);
    }
}
