@extends('Admin.layouts.app')
@section('Dashboard_title', 'All Posts')
@section('link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@endsection
@section('content')

    <div class="container">
@include('inc.message')
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
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>
                            <img src="{{ $post->imageUrl() }}" alt="image" width="100" height="100">
                        </td>
                        <td>{{ $post->User->name }}</td>

                        <td>
                            <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
        <div class="d-flex justify-content-center">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Back</a>
        </div>
    @endsection
