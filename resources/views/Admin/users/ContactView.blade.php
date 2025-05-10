@extends('Admin.layouts.app')
@section('Dashboard_title', 'Contact View')
@section('link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

@endsection
@section('content')
    <div class="col-12">


        <a href="" class="btn btn-success my-3">Excel Export</a>
        <h1 class="p-3 border text-center my-3">All Contacts</h1>
        @include('inc.message')
        <table class="table table-bordered w-100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>Subject</th>
                    <th>message</th>
                    <th>Response</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->message }}</td>




                        <td>
                            <a href="" class="btn btn-info">
                                <i class="fas fa-paper-plane"></i>
                            </a>
                        </td>

                        <td>
                            <form action="">
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

        <div>
            {{ $contacts->links() }}
        </div>

    @endsection
