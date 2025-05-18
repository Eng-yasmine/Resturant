<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::latest()->paginate(10);
        return view('Admin.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = Table::where('status','available')->latest()->paginate(10);
        return view('Admin.tables.create', compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTableRequest $request)
    {
        $validated = $request->validated();
        // $validated['user_id'] = auth()->check() ? auth()->user()->id : null;
        $table = Table::create($validated);

        return $table
            ? redirect()->route('tables.index')->with('success', 'Table Booking successfully.')
            : redirect()->back()->withErrors( 'Failed to Book Table.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTableRequest $request, Table $table)
    {
        $validated = $request->validated();
        // $validated['user_id'] = auth()->check() ? auth()->user()->id : null;
        $table = Table::update($validated);

        return $table
            ? redirect()->route('tables.index')->with('success', 'Table Booking successfully.')
            : redirect()->back()->withErrors( 'Failed to Book Table.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        $table->delete();
        return redirect()->route('tables.index')->with('success', 'Table Booking deleted successfully.');
    }
}
