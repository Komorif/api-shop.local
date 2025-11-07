<?php

namespace App\Http\Controllers;


use App\Http\Requests\CategoryRequest;
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


    // Добавление категории
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());
        return new ProductResource($category);
    }


    // Обновление категории
    public function update(string $id, CategoryRequest $request)
    {
        
        $category = Category::where("id", $id)->first();

        if ($category == null)
        {
            return response()->json([
                'message'=> 'Validation error',
                'errors'=>[
                    'flight_number'=> ["id can not be blank"],
                ]
            ]);
        }

        Category::where("id", operator: $id)->update($request->all());
        return ("Updated");
    }


    // Удаление категории
    public function destroy(string $id, Category $request)
    {
        $category = Category::where("id", $id)->first();

        if ($category == null)
        {
            return response()->json([
                'message'=> 'Validation error',
                'errors'=>[
                    'flight_number'=> ["id can not be blank"],
                ]
            ]);
        }

        Category::where("id", $id)->delete();
        return response(status:204);
    }

    
}
