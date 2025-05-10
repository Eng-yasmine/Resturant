@extends('Admin.layouts.app')

@section('Dashboard_title', 'create user')
@section('content')
    <div class="col-12">

        <h1 class="p-3 text-center my-3">Add New users</h1>
    </div>
    <div class="col-8 mx-auto">
        @include('inc.message')
        <form action="{{ route('admin.create') }}" method="POST" class="form border p-3">
            @csrf
            <div class="mb-3">
                <label for="name">User Name</label>
                <input type="text" id="name" value="" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email">User Email</label>
                <input type="email" id="email" value="" name="email" class="form-control">

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
                    <option value="admin">Admin</option>
                    <option value="user">User</option>

                </select>
                <div class="mb-3">
                    <input type="submit" value="Save" class="form-control bg-success">
                </div>
            </div>



        </form>

    </div>
@endsection
