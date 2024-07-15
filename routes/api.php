<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\CategoryController;
use App\Http\Controllers\API\V1\Auth\AuthController;
use App\Http\Controllers\API\V1\ProductController;
use App\Http\Controllers\API\V1\OrderController;



Route::middleware(['auth:api', 'api'])->prefix('v1')->group(function () {


Route::post('register', [AuthController::class, 'register']) ->withoutMiddleware(['auth:api']);
Route::post('login', [AuthController::class, 'login'])->withoutMiddleware(['auth:api']);

    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    //products
    Route::resource('product', ProductController::class);


        Route::get('/product/{product}', [ProductController::class, 'show'])
            ->name('product.show')
            ->withoutMiddleware(['auth:api']);

        Route::get('products/all', [ProductController::class, 'getAllProducts'])
            ->withoutMiddleware(['auth:api']);

        Route::get('/category/{category}', [ProductController::class, 'show'])
            ->name('category.show')->withoutMiddleware('auth:api', 'api');
        Route::get('/categories', [CategoryController::class, 'index']) ->withoutMiddleware(['auth:api']);
        Route::get('/productsWithPageination', [ProductController::class, 'index']) ->withoutMiddleware(['auth:api']);
        Route::get('/products/all', [ProductController::class, 'getAllProducts'])->withoutMiddleware(['auth:api']);




    //categories
    Route::resource('category', CategoryController::class);


    //orders
    Route::resource('order', OrderController::class);
});