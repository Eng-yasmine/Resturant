@extends('Admin.layouts.app')
@section('Dashboard_title', 'Update Post')
@section('link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@endsection
@section('content')
    <div class="container">
        <h1 class="p-3 border text-center my-3">Edit Post</h1>
        <div>
            @include('inc.message')
        </div>
        <form action="{{ url('Admin/posts/' . $post->id) }}" method="POST" enctype="multipart/form-data">


            @csrf
            @method('PUT')

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Post Title</label>
                    <input type="text" value="{{ $post->title }}" name="title" class="form-control"
                        placeholder="Enter Post Title">
                </div>
                <div class="form-group col-md-6">
                    <label>post Content</label>
                    <input type="text" value="{{ $post->content }}" name="content" class="form-control"
                        placeholder="Enter Post Content">
                </div>
                <div class="form-group col-md-6">
                    <label>Post Image</label>
                    <input type="file" value="{{ $post->image }}" name="image" class="form-control">
                </div>
                <div class="form-group col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </div>
            </div>
        </form>
    </div>

@endsection
