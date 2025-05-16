<?php

namespace App\Http\Controllers\Apis\menus;

use App\Http\Controllers\Apis\Traits\ApiResponseTrait;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Http\Resources\MenuResource;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::with('categories.menuItems')->latest()->paginate(10);
        return $menus
            ? $this->successResponse([MenuResource::collection($menus)], 'Menus retrieved successfully', 201)
            : $this->errorResponse('No menus found', 404);
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
    public function store(StoreMenuRequest $request)
    {
        $data = $request->validated();
        $menu = Menu::create($data);
        return $menu
            ? $this->successResponse(new MenuResource($menu), 'Menu created successfully', 201)
            : $this->errorResponse('Menu creation failed', 500);
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
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $data = $request->validated();
        $menu->update($data);
        return $menu
            ? $this->successResponse(new MenuResource($menu), 'Menu updated successfully', 201)
            : $this->errorResponse('Menu update failed', 500);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return $menu
            ? $this->successResponse(new MenuResource($menu), 'Menu deleted successfully', 200)
            : $this->errorResponse('Menu deletion failed', 500);
    }

}
