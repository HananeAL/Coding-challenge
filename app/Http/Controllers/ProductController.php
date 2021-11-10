<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Exception;
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
        // // $result = ['status' => 200];
        // try {
        //     $data = $this->productService->get();
        //     return $this->showAll($data);
        // } catch (Exception $e) {
        //     // $result = [
        //     //     'status' => 500,
        //     //     'error' => $e->getMessage(),
        //     // ];
        //     $this->errorResponse(500, $e->getMessage());

        // }
        // return response()->json($result, $result['status']);
    }

    public function store(Request $request)
    {

        // $data['image'] = $this->productService->handleImageUpload($request->file('image'));

        $result = ['status' => 200];
        try {
            $result['data'] = $this->productService->create($request->all());
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage(),
            ];
        }
        return response()->json($result, $result['status']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
