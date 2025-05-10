@extends('Admin.layouts.app')
@section('Dashboard_title', 'Contact View')
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
                    <th>Delete</th>
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
                            <a href="" class="btn btn-info">Send Message</a>
                        </td>
                        <td>
                            <form action="" method="POST">
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
                {{ $contacts->links() }}
            </div>

    @endsection
