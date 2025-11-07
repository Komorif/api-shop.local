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

    // Добавление товара
    public function store()
    {
        return "";
    }

    // Обновление товара
    public function update()
    {
        return "";
    }

    // Удаление товара
    public function destroy()
    {
        return "";
    }
}
