<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;


class CategoryController extends Controller
{
    // Получения списка категорий
    public function index()
    {
        $categories = Category::select('id', 'name', 'description')->get();
        
        return response()->json([
            "data" => $categories
        ], 200);
    }
    
    // Получения списка товаров категории
    public function show(string $id)
    {
        return "";
    }

    public function store(StoreCategoryRequest $request)
    {
        //
    }

}
