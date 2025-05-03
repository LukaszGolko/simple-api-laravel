<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('categories', [\App\Http\Controllers\Api\CategoryController::class, 'index']);
Route::get('categories/{category}', [\App\Http\Controllers\Api\CategoryController::class, 'show']);
Route::get('lists/categories', [\App\Http\Controllers\Api\CategoryController::class, 'list']);