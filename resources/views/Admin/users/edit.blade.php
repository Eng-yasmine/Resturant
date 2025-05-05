@extends('Admin.layouts.app')

@section('Dashboard_title', 'edit user info')
@section('content')
    <div class="col-12">

        <h1 class="p-3 text-center my-3">Add New users</h1>
    </div>
    <div class="col-8 mx-auto">
        @include('inc.message')
        <form action="{{ route('admin.update',['user'=>$user]) }}" method="POST" class="form border p-3">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name">User Name</label>
                <input type="text" id="name" value="{{ $user->name }}" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email">User Email</label>
                <input type="email" id="email" value="{{ $user->email }}" name="email" class="form-control">

            </div>
            <div class="mb-3">
                <label for="pass">User Password</label>
                <input type="password" id="pass" value="" name="password" class="form-control">

            </div>
            <div class="mb-3">
                <label for="confirm">Confirm Password</label>
                <input type="password" id="confirm" value="" name="password_confirmation" class="form-control">

            </div>

            <div class="mb-3">
                <label for="">Role</label>
                <select name="role" class="form-control">
                    <option @selected($user->role === 'admin') value="admin">Admin</option>
                    <option @selected($user->role === 'user') value="user">User</option>
                    <option @selected($user->role === 'customer') value="customer">Customer</option>
                </select>
                <div class="mb-3">
                    <input type="submit" value="Save" class="form-control bg-success">
                </div>
            </div>



        </form>

    </div>
@endsection
