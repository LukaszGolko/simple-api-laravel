<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('categories', \App\Http\Controllers\Api\V2\CategoryController::class);

    Route::get('products', [\App\Http\Controllers\Api\V2\ProductController::class, 'index'])->middleware('throttle:api');
});