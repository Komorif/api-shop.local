<?php

namespace App\Http\Controllers;


use App\Models\Category;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;


class CategoryController extends Controller
{
    // Получения списка категорий
    public function index()
    {
        $categories = Category::get();
        return CategoryResource::collection($categories);
    }


    // Получения списка товаров категории
    public function show(string $id, Category $request)
    {
        $category = Category::where('id', $id)->first();

        if ($category == null)
        {
            return response()->json([
                'code'=> 422,
                'message'=> 'Validation error',
                'errors'=>[
                    'flight_number'=> ["id can not be blank"],
                ]
            ]);
        }

        return ProductResource::collection($category->products);
    }
    
}
