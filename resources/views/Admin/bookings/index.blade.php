@extends('Admin.layouts.app')
@section('Dashboard_title', 'All Tables')
@section('link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection

@section('content')

    <div class="container">
        @include('inc.message')
        <h1 class="p-3 border text-center my-3">Booking History</h1>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"> Name</th>
                    <th scope="col"> Email</th>
                    <th scope="col"> Phone</th>
                    <th scope="col"> Date</th>
                    <th scope="col"> Time</th>
                    <th scope="col"> Status</th>
                    <th scope="col">Table Number</th>
                    <th scope="col">Table Seats</th>
                    <th scope="col">Reservation Code</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->user->email }}</td>
                        <td>{{ $booking->user->phone }}</td>
                        <td>{{ $booking->booking_date }}</td>
                        <td>{{ $booking->booking_time }}</td>
                        <td>
                            @if ($booking->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif ($booking->status == 'confirmed')
                                <span class="badge bg-success">Confirmed</span>
                            @else
                                <span class="badge bg-secondary">{{ ucfirst($booking->status) }}</span>
                            @endif
                        </td>
                        <td>{{ $booking->table->table_number }}</td>
                        <td>{{ $booking->table->seats }}</td>
                        <td>{{ $booking->id }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('booking.edit', $booking->id) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" >
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger delete-btn" data-id="{{ $booking->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $bookings->links() }}
    </div>

@endsection

