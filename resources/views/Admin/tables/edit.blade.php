@extends('Admin.layouts.app')
@section('Dashboard_title', 'Add Table')
@section('link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@endsection
@section('content')
    <div class="container">
        <h1 class="p-3 border text-center my-3">Add Table</h1>
        <form action="{{ route('tables.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                @include('inc.message')
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Table Number</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Post Title">
                </div>
                <div class="form-group col-md-6">
                    <label>Table Status</label>
                    <select class="form-select" name="status" id="table_number">
                        @foreach ($tables as $table)
                            <option value="{{ $table->table_number }}" data-seats="{{ $table->seats }}">
                                Table {{ $table->table_number }} (Seats: {{ $table->seats }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Table Seats</label>
                    <select class="form-select" name="seats" id="seats">
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
