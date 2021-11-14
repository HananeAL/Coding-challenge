<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Traits\ApiResponser;
use App\Utils\ImageFile;
use Illuminate\Http\Request;

class ProductController extends ApiController
{
    protected $productService;
    protected $per_page = 3;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $category = $request->query('category');
        $products = $this->productService->getProductsByCategory($category);
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

        $category = (array) $request->get('categories');
        $data->categories()->sync($category);

        return $this->successResponse(200, $data);
    }

    public function destroy(Request $request)
    {
        $id = $request->route('product');
        $data = $this->productService->delete($id);
        return $this->successResponse(200, $data);
    }
}
