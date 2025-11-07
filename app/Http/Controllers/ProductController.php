<?php

namespace App\Http\Controllers;

use App\Models\Product;

use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    // Просмотр товара
    public function index(string $id, Product $product)
    {
        $product = Product::where("id", $id)->get();
        return ProductResource::collection($product);
    }

    // Покупка товара
    public function store(string $id)
    {
        //
    }
}
