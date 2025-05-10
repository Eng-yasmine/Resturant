@extends('Admin.layouts.app')
@section('Dashboard_title', 'Add Menu')
@section('link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@endsection
@section('content')
    <div class="container">
        <h1 class="p-3 border text-center my-3">Add Menu Items</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                @include('inc.message')
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Item Name</label>
                    <input type="text" name="item_name" class="form-control" placeholder="Enter Employee Name">
                </div>
                <div class="form-group col-md-6">
                    <label>Item Description</label>
                    <input type="text" name="item_description" class="form-control" placeholder="Enter Employee Email">
                </div>
                <div class="form-group col-md-6">
                    <label>Item Image</label>
                    <input type="file" name="item_image" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Item Price</label>
                    <input type="text" name="item_price" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label>Category</label>
                    <select class="form-control" name="category">
                        <option value="category_id">Category name</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Item Status</label>
                    <select class="form-control" name="status"></select>
                    <option value="status">Select Status</option>
                    </select>
                </div>
                <div class="form-group col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Add Menu Item</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container">
        <h1 class="p-3 border text-center my-3">All Items Of Menu</h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Description</th>
                    <th scope="col">Item Price</th>
                    <th scope="col">Item Image</th>
                    <th scope="col">Category</th>
                    <th scope="col">Item Status</th>
                    <th scope="col">ِAction</th>

                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>

                    <td>
                        <a class="btn btn-primary" href="#">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>

                </tr>

            </tbody>
        </table>
    </div>
@endsection
