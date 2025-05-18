@extends('Admin.layouts.app')
@section('Dashboard_title', 'Add Table')
@section('link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@endsection
@section('content')
    <div class="container">
        <h1 class="p-3 border text-center my-3">Add Table</h1>
        <form action="{{ route('tables.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Table Number</label>
                    <input type="number" name="table_number" value="{{ old('table_number') }}" class="form-control" placeholder="Enter Table Number">
                </div>

                <div class="form-group col-md-6">
                    <label>Table Status</label>
                    <select class="form-control" name="status" id="status">
                        <option value="" disabled selected>Select Table Status</option>
                        <option value="available">Available</option>
                        <option value="busy">Busy</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label>Table Seats</label>
                    <select class="form-control" name="seats" id="seats">
                        <option value="" disabled selected>Select Number of Seats</option>
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">Seats {{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="form-group col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Add Table</button>
                </div>
            </div>
        </form>

    </div>

@endsection
