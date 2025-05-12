@extends('Admin.layouts.app')

@section('Dashboard_title', 'AllCategories')
@section('link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection
@section('content')
    <div class="col-12">
        <a href="{{ route('categories.create') }}" class="btn btn-primary my-3">Add Category</a>
        <a href="" class="btn btn-success my-3">Excel Export</a>
        <h1 class="p-3 border text-center my-3">All Categories</h1>

        @include('inc.message')

        <table class="table table-bordered w-100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category NAME</th>
                    <th>Category Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->status }}</td>
                        <td>
                            <span @class([
                                'badge bg-primary' => $category->status === 'active',
                                'badge bg-danger' => $category->status === 'not active',
                            ])>
                                {{ $category->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('categories.edit',  parameters: $category->id) }}"
                                class="btn btn-info">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $categories->links() }}
        </div>
    </div>
@endsection
