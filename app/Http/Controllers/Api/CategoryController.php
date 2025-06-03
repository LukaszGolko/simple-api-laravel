<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource;
use Symfony\Component\HttpFoundation\Response;

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
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::Create($request->all());

        return new CategoryResource($category);
    }
    public function update (Category $category, StoreCategoryRequest $request)
    {
        $category->update($request->all());

        return new CategoryResource($category);
    }
    public function destroy(Category $category){
        $category->delete();

        return response()->noContent();
    }
}
