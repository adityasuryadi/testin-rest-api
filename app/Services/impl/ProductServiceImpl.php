<?php 
namespace App\Services\Impl;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response as Resp;
class ProductServiceImpl implements ProductService
{
    public function Insert($request):void
    {
        try {
            $product = $request->all();
            $product['id'] = Str::uuid();
            Product::create($product);
        } catch (\Throwable $th) {
            throw response()->error($th->getMessage());
        }
    }

    public function getProducts():Collection
    {
        $products = Product::all();
        return $products;
    }

    public function findProductById(string $productId):?Product{
       try {
            $product = Product::find($productId);
            if(!$product){
                return null;
            }
            return $product;
       } catch (\Throwable $th) {
            throw response()->error($th->getMessage());
       }
    }

    public function update($productId,$request):?Product{
        try {
            $product = $this->findProductById($productId);
            if (!$product) {
                return $product;
            }
            $product->name = $request->name;
            $product->stock = $request->stock;
            $product->price = $request->price;
            $product->save();

            return $product;

        } catch (\Throwable $th) {
            throw new HttpResponseException(
                response()->json([
                    'data'=> $th->getMessage(),
                    'status'=>Resp::$statusTexts[500],
                    'code'=>Resp::HTTP_BAD_REQUEST],500)
            );
        }
    }
    public function delete($productId):void{
        try {
            $product = $this->findProductById($productId);
            if(!$product){
                throw new HttpResponseException(
                    response()->json([
                        'data'=> null,
                        'status'=>Resp::$statusTexts[404],
                        'code'=>Resp::HTTP_BAD_REQUEST],404)
                );
            }
            $product->delete();
            
        } catch (\Throwable $th) {
            throw new HttpResponseException(
                response()->json([
                    'data'=> $th->getMessage(),
                    'status'=>Resp::$statusTexts[500],
                    'code'=>Resp::HTTP_INTERNAL_SERVER_ERROR],500)
            );
        }
    }
}