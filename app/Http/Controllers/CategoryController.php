<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Menu;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('Menu')->paginate(10);
        return view('Admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $menus = Menu::all();
        return view('Admin.categories.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        $category = Category::create($validated);

        return $category
            ? redirect()->route('categories.index')->with('success', 'Category created successfully.')
            : redirect()->back()->withErrors('Failed to create category.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $category = Category::with('Menu')->findOrFail($category->id);
        return view('Admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        $category->update($validated);

        return $category
            ? redirect()->route('categories.index')->with('success', 'Category updated successfully.')
            : redirect()->back()->withErrors('Failed to update category.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return $category
            ? redirect()->route('categories.index')->with('success', 'Category deleted successfully.')
            : redirect()->back()->withErrors('Failed to delete category.');
    }
}
