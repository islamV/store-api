<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\CategoryController;
use App\Http\Controllers\API\V1\Auth\AuthController;
use App\Http\Controllers\API\V1\ProductController;
use App\Http\Controllers\API\V1\OrderController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::middleware(['auth:api', 'api'])->prefix('v1')->group(function () {

    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    //products

    Route::prefix('product')->group(function () {

     Route::get('/{id}', [ProductController::class, 'getProduct'])->withoutMiddleware('auth:api' , 'api');
    //  Route::get('/{id}', [ProductController::class, 'getImage']);
     Route::post('/', [ProductController::class, 'store']);
     Route::post('/{id}', [ProductController::class, 'update']);
     Route::delete('/delete', [ProductController::class, 'delete']);

    });

    Route::prefix('category')->group(function () {
        Route::get('get/{id}' , [CategoryController::class, 'getCategory']) ;
        Route::post('/' ,[CategoryController::class, 'store']);
        Route::put('/{id}' ,[CategoryController::class, 'update']);
        Route::delete('/{id}' ,[CategoryController::class, 'delete']);
    });
    Route::prefix('order')->group(function () {
        Route::post('/',[OrderController::class, 'store']);
    });
    Route::get('orders' , [OrderController::class, 'index']);
});
Route::get('categories', [CategoryController::class, 'index']);
Route::get('products', [ProductController::class, 'index']);
Route::get('products/all', [ProductController::class, 'getAllProducts']);
