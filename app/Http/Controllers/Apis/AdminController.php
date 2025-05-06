<?php

namespace App\Http\Controllers\Apis;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Apis\Traits\ApiResponseTrait;

use function PHPUnit\Framework\returnSelf;

class AdminController extends Controller
{
    use ApiResponseTrait;
    public function index(User $user)
    {
        Debugbar::info("All user");
        $users = User::latest()->paginate(perPage: 10);
        if ($users) {

            return $this->successResponse($users, 'all users', 200);
        }
        return $this->errorResponse('No users found', 404);
    }

    public function store(StoreUserRequest $request)
    {
        $userData = $request->validated();
        Debugbar::startMeasure('render', 'Time for rendering');
        $user = User::create($userData);
        Debugbar::stopMeasure('render');
        if ($user) {
            return $this->successResponse($user, 'User added successfully', 201);
        }
        return $this->errorResponse('failed to Add user ! Try again', 0);
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        $userData = $request->validated();
        $userData['password'] = $request->filled('password') ? bcrypt($request->password) : $user->password;
        unset($userData['password_confirmation']);

        $updated = $user->update($userData);

        if ($updated) {
            return $this->successResponse($user, 'User info Updated successfully', 201);
        }

        return $this->errorResponse('Failed to update! Try again.', 404);
    }

    public function destroy(User $user)
    {
        $user = $user->where('id', $user->id)->delete();

        if ($user) {
    return $this->successResponse($user,'User deleted Successfully', 200);
        }
        return $this->errorResponse('User deleted failed', 404);
    }
}
