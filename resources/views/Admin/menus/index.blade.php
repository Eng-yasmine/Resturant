@extends('Admin.layouts.app')
@section('Dashboard_title', 'All user')
@section('content')

    <div class="col-12">
        <a href="{{ route('menus.create') }}" class="btn btn-primary my-3">Add Menu</a>
        <a href="" class="btn btn-success my-3">Excel Export</a>
        <h1 class="p-3 border text-center my-3">All Menus</h1>
        @include('inc.message')
        <table class="table table-bordered w-100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $menu)
                    <tr>


                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $menu->name }}</td>
                        <td>
                            <span @class([
                                'badge bg-primary' => $menu->status === 'active',
                                'badge bg-warning' => $menu->status === 'inactive',
                            ])>
                                {{ $menu->status }}
                            </span>
                        <td>
                            <a href="{{ route('menus.edit', ['menu' => $menu]) }}" class="btn btn-info">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('menus.destroy', ['menu' => $menu]) }}" method="POST">
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
                {{ $menus->links() }}
            </div>

        @endsection
