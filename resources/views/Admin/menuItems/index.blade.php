@extends('Admin.layouts.app')

@section('Dashboard_title', 'All Category Items')
@section('link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection
@section('content')
    <div class="col-12">
        <a href="{{ route('menuItems.create') }}" class="btn btn-primary my-3">Add Item</a>
        <a href="" class="btn btn-success my-3">Excel Export</a>
        <h1 class="p-3 border text-center my-3">All Items</h1>

        @include('inc.message')

        <table class="table table-bordered w-100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th> Item NAME</th>
                    <th> Item Description</th>
                    <th> Item Image</th>
                    <th> Item Price</th>
                    <th> Item Category</th>
                    <th> Item Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menuItems as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <img src="{{  asset('storage/images/').$item->image }}" alt="Menu Item Image"
                                style="width: 100px; height: 100px;">
                        </td>
                        <td>{{ $item->price }}</td>
                        <td>

                            {{ $item->category->name ?? 'No Category' }}


                        </td>
                        <td>
                            <span @class([
                                'badge bg-primary' => $item->status === 'active',
                                'badge bg-danger' => $item->status === 'not active',
                            ])>
                                {{ $item->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('menuItems.edit', parameters: $item->id) }}" class="btn btn-info">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('menuItems.destroy', $item->id) }}" method="POST" class="d-inline">
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
            {{ $menuItems->links() }}
        </div>
    </div>
@endsection
