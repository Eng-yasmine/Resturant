<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Apis\Traits\ApiResponseTrait;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\Debugbar\Facades\Debugbar;

class AdminController extends Controller
{
    use ApiResponseTrait;
    public function index(User $user)
    {
        Debugbar::info("All user");
        $users = User::latest()->paginate(perPage: 10);
        if($users){

            return $this->successResponse('all users',200);
        }
    }
}
