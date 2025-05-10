@extends('Admin.layouts.app')
@section('title', 'Add Category')

@section('content')
<div class="container">
    <h1 class="p-3 border text-center my-3">Add Category</h1>
    <form action="" method="POST">
        <div>
            @include('inc.message')
        </div>
        @csrf
        <div class="form-group">
            <label for="category">Category Name</label>
            <input type="Text" name="Category_Name" class="form-control" id="category" placeholder="Enter Category Name">
        </div>
        <div class="form-group">
            <label for="CategoryStatus">Category Status</label>
            <select class="form-control" name="Category_Status" id="CategoryStatus">
                <option>Active</option>
                <option>Not Active</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
</div>
<div class="container">
    <h1 class="p-3 border text-center my-3">All Categories</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>
                <th scope="col">Category Status</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>

            </tr>
        </thead>
        <tbody>
            <tr>

                <td>1</td>
                <td>Category</td>
                <td>active</td>
                <td> <a class="btn btn-primary">Edit</a> </td>
                <td>
                    <form action="">
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

        </tbody>
    </table>
    </div>
@endsection
