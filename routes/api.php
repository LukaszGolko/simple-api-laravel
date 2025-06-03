<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware(Authenticate::using('sanctum'));

Route::apiResource('categories', \App\Http\Controllers\Api\CategoryController::class);

Route::get('products', [\App\Http\Controllers\Api\ProductController::class, 'index']);