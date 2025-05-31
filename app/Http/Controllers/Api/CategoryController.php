<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::all());
    }
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }
    public function list()
    {
        return CategoryResource::collection(Category::all());
    }
    public function store(Request $request)
    {
        $category = Category::Create($request->all());

        return new CategoryResource($category);
    }
}
