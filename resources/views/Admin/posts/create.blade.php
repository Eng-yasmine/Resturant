@extends('Admin.layouts.app')
@section('Dashboard_title', 'Add Post')
@section('link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@endsection
@section('content')
    <div class="container">
        <h1 class="p-3 border text-center my-3">Add Post</h1>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                @include('inc.message')
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Post Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Post Title">
                </div>
                <div class="form-group col-md-6">
                    <label>post Content</label>
                    <input type="text" name="content" class="form-control" placeholder="Enter Post Content">
                </div>
                <div class="form-group col-md-6">
                    <label>Post Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Add Post</button>
                </div>
            </div>
        </form>
    </div>

@endsection
