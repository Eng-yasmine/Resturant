@extends('Admin.layouts.app')
@section('Dashboard_title', 'All user')
@section('content')
    <div class="col-12">

        <a href="{{ route('admin.create') }}" class="btn btn-primary my-3">Add User</a>
        <a href="" class="btn btn-success my-3">Excel Export</a>
        <h1 class="p-3 border text-center my-3">All Users</h1>
        @include('inc.message')
        <table class="table table-bordered w-100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>ROLE</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>


                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>

                                <span @class([
                                    'badge bg-primary' => $user->role === 'admin',
                                    'badge bg-success' => $user->role === 'user',
                                    'badge bg-warning' => $user->role === 'customer',
                                ])>
                                    {{ $user->role }}
                                </span>


                        </td>

                        <td>
                            <a href="{{ route('admin.edit', ['user' => $user]) }}" class="btn btn-info">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.delete',['user' => $user]) }}" method="POST">
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
            <div>
                {{ $users->links() }}
            </div>

        @endsection
