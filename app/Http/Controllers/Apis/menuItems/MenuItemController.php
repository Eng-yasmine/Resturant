<?php

namespace App\Http\Controllers\Apis\menuItems;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\MenuItemResource;
use App\Http\Requests\StoreMenuItemRequest;
use App\Http\Requests\UpdateMenuItemRequest;
use App\Http\Controllers\Apis\Traits\ApiResponseTrait;

class MenuItemController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menuItems = MenuItem::with('category')->latest()->paginate(10);
        return $menuItems
            ? $this->successResponse(MenuItemResource::collection($menuItems), 'Menu items retrieved successfully.', 200)
            : $this->errorResponse('Failed to retrieve menu items.', 404);
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
    public function store(StoreMenuItemRequest $request,MenuItem $menuItem)
    {
        $validatedData = $request->validated();

        // Handle file upload if an image is provided
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('storage/images', 'public');
            $validatedData['image'] = $path;
        }

        $menuItem = MenuItem::create($validatedData);

        return $menuItem
            ? $this->successResponse(new MenuItemResource($menuItem), 'Menu item created successfully.', 201)
            : $this->errorResponse('Failed to create menu item.', 400);


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
        return $menuItem
            ? $this->successResponse(new MenuItemResource($menuItem), 'Menu item updated successfully.', 200)
            : $this->errorResponse('Failed to update menu item.', 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuItem $menuItem)
    {
        // Delete the image if it exists
        if ($menuItem->image && Storage::exists('storage/images/' . $menuItem->image)) {
            Storage::delete('storage/images/' . $menuItem->image);
        }

        $menuItem->delete();

        return $menuItem
            ? $this->successResponse(null, 'Menu item deleted successfully.', 200)
            : $this->errorResponse('Failed to delete menu item.', 400);
    }
}
