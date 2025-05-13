@extends('Admin.layouts.app')

@section('Dashboard_title', 'Add Menu Item')
{{-- @section('title', 'Add Menu Item') --}}

@section('link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection

@section('content')
    <div class="container">
        @include('inc.message')

        <h1 class="p-3 border text-center my-3">Add Menu Item</h1>

        <form action="{{ route('menuItems.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label>Item Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                        placeholder="Enter Item Name">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label>Item Description</label>
                    <input type="text" name="description" value="{{ old('description') }}" class="form-control"
                        placeholder="Enter Item description">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label>Item Image</label>
                    <input type="file" name="image" value="{{ old('image') }}" class="form-control">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label>Item price</label>
                    <input type="numder" name="price" value="{{ old('price') }}" class="form-control"
                        placeholder="Enter Item price">
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label for="category_id">Choose Category </label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="">-- Select Item Status --</option>
                        <option value="active">Active</option>
                        <option value="not active">Not Active</option>
                    </select>
                </div>

                <div class="form-group col-12 mt-3">
                    <button type="submit" class="btn btn-primary w-100">Add Menu Item</button>
                </div>
            </div>
        </form>
    </div>
@endsection
