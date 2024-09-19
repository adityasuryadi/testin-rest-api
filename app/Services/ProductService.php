<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Product;

Interface ProductService {
    public function Insert($product):void;
    public function getProducts():Collection;
    public function findProductById(string $productId):?Product;
    public function update($productId,$request):?Product;
    public function delete($productId):void;
}