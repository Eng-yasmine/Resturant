<?php

namespace App\Http\Controllers\main;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Barryvdh\Debugbar\Facades\Debugbar;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
        Debugbar::info("1234");
        $users = User::latest()->paginate(perPage: 10);
        return view('Admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.users.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $userData = $request->validated();
        Debugbar::startMeasure('render', 'Time for rendering');
        $user = User::create($userData);
        Debugbar::stopMeasure('render');
        return redirect()->route('admin.create')->with('success', 'User added successfully');
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
    public function edit(User $user)
    {
        return view('Admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        $userData = $request->validated();
        $userData['password'] =  $request->filled('password') ? bcrypt($request->password) : $user->password;
        unset($userData['password_confirmation']);

        $user->update($userData);
        return redirect()->route('admin.index')->with('success','User info Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->where('id',$user->id)->delete();
        return redirect()->route('admin.index')->with('success','User deleted Successfully');
    }
}
