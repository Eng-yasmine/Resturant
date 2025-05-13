<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMenuItemRequest;
use App\Http\Requests\UpdateMenuItemRequest;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menuItems = MenuItem::with('category')->paginate(10);
        // $categories = Category::all();
        return view('Admin.menuItems.index', compact('menuItems'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('Admin.menuItems.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuItemRequest $request)
    {
        $validatedData = $request->validated();

        // Handle file upload if an image is provided
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('storage/images', 'public');
            $validatedData['image'] = $path;
        }

        $menuItem = MenuItem::create($validatedData);

        return $menuItem
            ? redirect()->route('menuItems.index')->with('success', 'Menu item created successfully.')
            : redirect()->back()->withErrors('Failed to create menu item.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuItem $menuItem)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MenuItem $menuItem)
    {
        $menuItem = MenuItem::with('category')->findOrFail($menuItem->id);
        $categories = Category::all();
        return view('Admin.menuItems.edit', compact('menuItem','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuItemRequest $request, MenuItem $menuItem)
    {
        $validatedData = $request->validated();

        // Handle file upload if an image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($menuItem->image && Storage::exists('storage/images/' . $menuItem->image)) {
                Storage::delete('storage/images/' . $menuItem->image);
            }

            $path = $request->file('image')->store('storage/images', 'public');
            $validatedData['image'] = $path;
        }

        $menuItem->update($validatedData);

        return redirect()->route('menuItems.index')->with('success', 'Menu item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        if ($menuItem->image && Storage::exists('storage/images/' . $menuItem->image)) {
            Storage::delete('storage/images/' . $menuItem->image);
        }
        return redirect()->route('menuItems.index')->with('success', 'Menu item deleted successfully.');
    }
}
