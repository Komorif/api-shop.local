<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post("/registration", [UserController::class, "registration"]);
Route::post("/auth", [UserController::class, "auth"]);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('categories', [CategoryController::class, 'index']); // Получения списка категорий
    Route::get('/categories/{category_id}/products', [CategoryController::class, 'show']); // Получения списка товаров категории
    Route::get('/products/{product_id}', [ProductController::class, 'index']); // Просмотр товара
    Route::get('/orders', [OrderController::class, 'index']); // Просмотр списка заказов пользователя
    
    
    Route::post('/payment-webhook', [PaymentController::class, 'store']); // Покупка товара
    
    //Route::post('/products/{product_id}/buy', [ProductController::class,'buy_store']); // Покупка товара

    // Личное обновление
    Route::post('categories', [CategoryController::class, 'store']); // Добавление категории
    Route::put('categories/{category_id}', [CategoryController::class, 'update']); // Обновление категории
    Route::delete('categories/{category_id}', [CategoryController::class, 'destroy']); // Удаление категории

    Route::post('products', [ProductController::class, 'store']); // Добавление товара
    Route::put('products/{product_id}', [ProductController::class, 'update']); // Обновление товара
    Route::delete('products/{product_id}', [ProductController::class, 'destroy']); // Удаление товара
});
