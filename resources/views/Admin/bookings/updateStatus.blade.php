@extends('Admin.layouts.app')
@section('Dashboard_title', 'Update Status Booking')

@section('content')

    <div class="container">
        @include('inc.message')
        <h1 class="p-3 border text-center my-3">Edit Booking Status </h1>
        <form action="{{ route('updateStatus', $booking->id) }}" method="POST">
            @csrf
            @method('PUT')

            <select name="status" class="form-control" id="status">
                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="rejected" {{ $booking->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>

            <button type="submit" class="btn btn-primary mt-2">Update Status</button>
        </form>
    </div>
@endsection
'scripts')
    <script>
        $(document).ready(function() {
            $('#status').select2();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#status').on('change', function() {
                var selectedValue = $(this).val();
                console.log('Selected value: ' + selectedValue);
            });
        });
    </script>


