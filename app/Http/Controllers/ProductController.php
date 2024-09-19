<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateproductRequest;
use App\Services\ProductService;


class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService){
        $this->productService = $productService;
    }
    public function create(CreateproductRequest $request){
        $product = $this->productService->Insert($request);
        return response()->ok([]);
    }

    public function index(){
        $products = $this->productService->getProducts();
        return response()->ok($products);
    }

    public function getProduct($productId){
        $product = $this->productService->findProductById($productId);
        if(!$product){
            return response()->notFound();
        }
        return response()->ok($product);
    }

    public function update($productId,CreateproductRequest $request){
        $product = $this->productService->update($productId,$request);
        if (!$product) {
            return response()->notFound();
        }
        return response()->ok($product);
    }

    public function delete($productId){
        $this->productService->delete($productId);
        return response()->ok();
    }
}
