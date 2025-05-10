@extends('Admin.layouts.app')
@section('Dashboard_title', 'Add Post')
@section('link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@endsection
@section('content')
<div class="container">
    <h1 class="p-3 border text-center my-3">Add Post</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            @include('inc.message')
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label>Post Title</label>
                <input type="text" name="post_title" class="form-control" placeholder="Enter Employee Name">
            </div>
            <div class="form-group col-md-6">
                <label>post Content</label>
                <input type="email" name="post_content" class="form-control" placeholder="Enter Employee Email">
            </div>
            <div class="form-group col-md-6">
                <label>Post Image</label>
                <input type="file" name="post_image" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>Post Owner</label>
                <input type="text" name="user_id" class="form-control">
            </div>
            <div class="form-group col-md-12 mt-3">
                <button type="submit" class="btn btn-primary">Add Post</button>
            </div>
        </div>
    </form>
</div>
<div class="container">
    <h1 class="p-3 border text-center my-3">All Posts</h1>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Post Title</th>
                <th scope="col">Post Content</th>
                <th scope="col">Post Image</th>
                <th scope="col">Post owner</th>
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
