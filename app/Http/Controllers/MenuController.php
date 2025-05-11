<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::latest()->paginate(10);
        return view('Admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.menus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        $menu_validation = $request->validated();
        $menu = Menu::create($menu_validation);
        return $menu
        ? redirect()->route('menus.index')->with('success', 'Menu created successfully.')
        : redirect()->back()->with('error', 'Menu creation failed.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $menu = Menu::find($menu->id);
        return view('Admin.menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $menu->update($request->validated());
        return $menu
        ? redirect()->route('menus.index')->with('success', 'Menu updated successfully.')
        : redirect()->back()->with('error', 'Menu update failed.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return $menu
        ? redirect()->route('menus.index')->with('success', 'Menu deleted successfully.')
        : redirect()->back()->with('error', 'Menu deletion failed.');
    }
}
