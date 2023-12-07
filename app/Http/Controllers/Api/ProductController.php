<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ProductCollection;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index(){
        return new ProductCollection(Product::all());
    }
    public function show(Product $Product)
    {
        return new ProductResource($Product);
    }
    public function store(StoreProductRequest  $request)
    {
        $validate = $request->validated();
        $thumbnail = Storage::putFile("productS",$request->thumbnail);
        $Product =Product::create($validate);
        return new ProductResource($Product);
    }
    public function update(UpdateProductRequest $request ,Product $Product  )
    {
        $validate = $request->validated();
        if($request->has('thumbnail'))
        {
            Storage::delete($Product->thumbnail);
            $thumbnail = Storage::putFile("productS",$request->thumbnail);
        }
        $Product->update($validate);
        return new ProductResource($Product);

    }
    public function destroy(Request $request ,Product $Product)
    {
        $Product->delete();
        return response()->noContent();
    }

}
