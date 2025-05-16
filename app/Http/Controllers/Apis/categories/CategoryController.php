<?php

namespace App\Http\Controllers\Apis\categories;

use App\Http\Controllers\Apis\Traits\ApiResponseTrait;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Session\Store;

class CategoryController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('menuItems')->latest()->paginate(10);
        return $categories
        ? $this->successResponse(CategoryResource::collection($categories), 'Categories retrieved successfully',200)
        : $this->errorResponse('No categories found', 404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $ValidatedData = $request->validated();
        $category = Category::create($ValidatedData);
        return $category
        ? $this->successResponse(new CategoryResource($category), 'Category created successfully',201)
        : $this->errorResponse('Failed to create category', 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validatedData = $request->validated();
        $category->update($validatedData);
        return $category
        ? $this->successResponse(new CategoryResource($category), 'Category updated successfully',200)
        : $this->errorResponse('Failed to update category', 500);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $category
        ? $this->successResponse($category, 'Category deleted successfully',200)
        : $this->errorResponse('Failed to delete category', 500);
    }

}
