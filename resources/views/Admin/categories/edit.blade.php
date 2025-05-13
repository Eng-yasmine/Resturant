@extends('Admin.layouts.app')

@section('Dashboard_title', 'Edit Category Info')

@section('link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection

@section('content')
    <div class="container">
        @include('inc.message')

        <h1 class="p-3 border text-center my-3">Edit Category</h1>

        <form action="{{ route('categories.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label>Category Name</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control"
                        placeholder="Enter Category Name">
                </div>
                <input type="hidden" name="menu_id" value="{{ $category->menu_id }}" class="form-control">

                <div class="form-group col-md-6 mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="">-- Select Category Status --</option>
                        <option value="active">Active</option>
                        <option value="not active">Not Active</option>
                    </select>
                </div>

                <div class="form-group col-12 mt-3">
                    <button type="submit" class="btn btn-primary w-100">Add Category</button>
                </div>
            </div>
        </form>
    </div>
@endsection
