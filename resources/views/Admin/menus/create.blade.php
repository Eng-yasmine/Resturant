@extends('Admin.layouts.app')
@section('Dashboard_title', 'Add Menu')
@section('link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@endsection
@section('content')
    <div class="container">
        <div>
            @include('inc.message')
        </div>
        <h1 class="p-3 border text-center my-3">Add Menu</h1>
        <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-6">
                <label>Menu Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Post Content">
            </div>
            <div class="col-md-6 mb-3">
                <label for="">Menu Status</label>
                <select name="status" class="form-control">
                    <option value="active">Active </option>
                    <option value="inactive">Not Active</option>

                </select>

                <div class="form-group col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Add Menu</button>
                </div>
            </div>
        </form>
    </div>

@endsection
