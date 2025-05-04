@extends('Admin.layouts.app')

@section('content')
<div class="col-12">

    <a href="" class="btn btn-primary my-3">Add Post</a>
    <a href="" class="btn btn-success my-3">Excel Export</a>
    <h1 class="p-3 border text-center my-3">All Users</h1>

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
            <tr>
                <td>iteration</td>
                <td></td>
                <td></td>
                <td>
                    <span class="badge bg-warning my-1"></span>
                </td>
                <td></td>
                <td>
                    <img src="" width="200">
                </td>
                <td>
                    <a href="" class="btn btn-info">Edit</a>
                </td>
                <td>
                    <form action="" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    <div>
        {{-- {{ $posts->links() }} --}}
    </div>
</div>
@endsection
