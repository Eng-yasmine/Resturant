@extends('Admin.layouts.app')

@section('Dashboard_title', 'All Employees')
@section('link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection
@section('content')
    <div class="col-12">
        <a href="{{ route('employees.create') }}" class="btn btn-primary my-3">Add Employee</a>
        <a href="" class="btn btn-success my-3">Excel Export</a>
        <h1 class="p-3 border text-center my-3">All Employees</h1>

        @include('inc.message')

        <table class="table table-bordered w-100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Salary</th>
                    <th>NationalID</th>
                    <th>Address</th>
                    <th>Age</th>
                    <th>Image</th>
                    <th>Start of Work</th>
                    <th>Position</th>
                    <th>Gender</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->salary }}</td>
                        <td>{{ $employee->national_ID }}</td>
                        <td>{{ $employee->address }}</td>
                        <td>{{ $employee->date_of_birth }}</td>
                        <td>
                            <img src="{{ $employee->imageUrl() }}" alt="Menu Item Image"
                                style="width: 100px; height: 100px;">
                        </td>
                        <td>{{ $employee->start_date }}</td>
                    <td>
                            <span @class([
                                'badge bg-primary' => in_array($employee->position, [
                                    'master_chef',
                                    'chef',
                                    'assistant_chef',
                                ]),
                                'badge bg-success' => in_array($employee->position, ['waiter', 'cashier']),
                                'badge bg-danger' => $employee->position === 'manager',
                                'badge bg-info' => $employee->position === 'cleaner',
                                'badge bg-secondary' => $employee->position === 'security',
                                'badge bg-dark' => $employee->position === 'delivery',
                                'badge bg-light' => $employee->position === 'receptionist',
                                'badge bg-white' => $employee->position === 'accountant',
                                'badge bg-warning' => $employee->position === 'supervisor',
                            ])>
                                {{ $employee->position }}
                            </span>
                        </td>
                        <td>
                            <span @class([
                                'badge bg-primary' => $employee->gender === 'male',
                                'badge bg-warning' => $employee->gender === 'female',
                            ])>
                                {{ $employee->gender }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('employees.edit', parameters: $employee->id) }}" class="btn btn-info">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
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
            {{ $employees->links() }}
        </div>
    </div>
@endsection
