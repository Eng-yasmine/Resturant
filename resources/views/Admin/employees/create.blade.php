@extends('Admin.layouts.app')

@section('Dashboard_title', 'Add Employee')

@section('link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection

@section('content')
    <div class="container">
        @include('inc.message')

        <h1 class="p-3 border text-center my-3">Add Employee</h1>

        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label>Employee Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Employee Name">
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label>Employee Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Employee Email">
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label>Employee Phone</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Enter Employee Phone">
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label>Employee Salary</label>
                   <input type="number" name="salary" value="{{ old('salary') }}" class="form-control" step="0.01" min="0" placeholder="Enter Employee Salary">

                </div>

                <div class="form-group col-md-6 mb-3">
                    <label>Employee National ID</label>
                    <input type="text" name="national_ID" value="{{ old('national_ID') }}" class="form-control" placeholder="Enter National ID">
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label>Date of Birth</label>
                    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control">
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label>Address</label>
                    <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="Enter Address">
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label>Start Date</label>
                    <input type="date" name="start_date" value="{{ old('start_date') }}" class="form-control">
                </div>
                {{-- <input type="hidden" name="user_id" value="{{ auth()->id() }}"> --}}

                <div class="form-group col-md-6 mb-3">
                    <label for="user_id">Choose User </label>
                    <select name="user_id" id="user_id" class="form-control">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label>Employee Image</label>
                    <input type="file" name="image" value="{{ old('image') }}" class="form-control">
                </div>

                <div class="form-group col-md-6 mb-3">
                    <label>Employee Position</label>
                    <select name="position" class="form-control">
                        <option value="">-- Select Position --</option>
                        <option value="chef">Chef</option>
                        <option value="assistant_chef">Assistant Chef</option>
                        <option value="master_chef">Master Chef</option>
                        <option value="cashier">Cashier</option>
                        <option value="waiter">Waiter</option>
                        <option value="manager">Manager</option>
                        <option value="security">Security</option>
                        <option value="cleaner">Cleaner</option>
                        <option value="supervisor">Supervisor</option>
                        <option value="delivery">Delivery</option>
                        <option value="receptionist">Receptionist</option>
                        <option value="accountant">Accountant</option>
                        <option value="restaurant_manager">Restaurant Manager</option>
                        <option value="delivery">Delivery</option>
                    </select>


                </div>

                <div class="form-group col-md-6 mb-3">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                        <option value="">-- Select Gender --</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <div class="form-group col-12 mt-3">
                    <button type="submit" class="btn btn-primary w-100">Add Employee</button>
                </div>
            </div>
        </form>
    </div>
@endsection
