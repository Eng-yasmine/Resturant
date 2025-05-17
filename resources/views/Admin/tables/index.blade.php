@extends('Admin.layouts.app')
@section('Dashboard_title', 'All Tables')
@section('link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@endsection
@section('content')

    <div class="container">
@include('inc.message')
        <h1 class="p-3 border text-center my-3">All Tables</h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Table Number</th>
                    <th scope="col">Table Status</th>
                    <th scope="col">Table Seats</th>
                    <th scope="col">User Name</th>
                    <th scope="col">ِAction</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($tables as $table)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $table->table_number }}</td>
                        <td>{{ $table->status }}</td>
                        <td>{{ $table->seats }}</td>
                        <td>{{ $table->User->name }}</td>

                        <td>
                            <a class="btn btn-primary" href="{{ route('tables.edit',$table->id) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('tables.destroy', $table->id) }}" method="POST" class="d-inline">
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
            {{ $tables->links() }}
        </div>
        {{-- <div class="d-flex justify-content-center">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Back</a>
        </div> --}}
    @endsection
