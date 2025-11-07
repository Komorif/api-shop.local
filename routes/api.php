<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;




//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post("/registration", [UserController::class, "registration"]);
Route::post("/auth", [UserController::class, "auth"]);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('categories', [CategoryController::class, 'index']); // Получения списка категорий
    Route::get('/categories/{category_id}/products', [CategoryController::class, 'show']); // Получения списка товаров категории
    
    Route::post('categories', [CategoryController::class, 'store']); // Добавление категории
    Route::put('categories/{category_id}', [CategoryController::class, 'update']); // Обновление категории
    Route::delete('categories/{category_id}', [CategoryController::class, 'destroy']); // Удаление категории
    
    Route::get('/products/{product_id}', [ProductController::class, 'index']); // Просмотр товара



    //Route::post('/products/{product_id}/buy', [ProductController::class,'store']); // Покупка товара
    //Route::post('/payment-webhook', [PaymentController::class,'store']); // Покупка товара
    //Route::get('/orders', [OrderController::class,'store']); // Покупка товара
});
