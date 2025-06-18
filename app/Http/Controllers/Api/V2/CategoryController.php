<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
use Illuminate\Database\QueryException;

class CategoryController extends Controller
{
    public function index()
    {
        abort_if(! auth()->user()->tokenCan('categories-list'), 403);

        return CategoryResource::collection(Category::where('id', '<', 3)->get());
    }
    public function show(Category $category)
    {
        abort_if(! auth()->user()->tokenCan('categories-show'), 403);
        
        return new CategoryResource($category);
    }
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = 'categories/' . Str::uuid() . '.' . $file->extension();
            $file->storePubliclyAs('public', $name);
            $data['photo'] = $name;
        }
            $category = Category::create($data);

            return new CategoryResource($category);

    }
    public function update(Category $category, StoreCategoryRequest $request)
    {
        $category->update($request->all());

        return new CategoryResource($category);
    }
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->noContent();
    }
}
