@extends('Admin.layouts.app')
@section('Dashboard_title', 'Add Category')
@section('link')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

@endsection
@section('content')
<div class="container">
    <h1 class="p-3 border text-center my-3">Add Employee</h1>
    <form action="" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        @include('inc.message')
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label>Employee Name</label>
            <input type="text" name="employee_name" class="form-control" placeholder="Enter Employee Name">
        </div>
        <div class="form-group col-md-6">
            <label>Employee Email</label>
            <input type="email" name="employee_email" class="form-control" placeholder="Enter Employee Email">
        </div>

        <div class="form-group col-md-6">
            <label>Employee Phone</label>
            <input type="text" name="employee_phone" class="form-control" placeholder="Enter Employee Phone">
        </div>
        <div class="form-group col-md-6">
            <label>Employee National ID</label>
            <input type="text" name="national_id" class="form-control" placeholder="Enter National ID">
        </div>

        <div class="form-group col-md-6">
            <label>Employee Password</label>
            <input type="password" name="employee_password" class="form-control" placeholder="Enter Password">
        </div>
        <div class="form-group col-md-6">
            <label>Employee Salary</label>
            <input type="number" name="employee_salary" class="form-control" placeholder="Enter Salary">
        </div>

        <div class="form-group col-md-6">
            <label>Employee Image</label>
            <input type="file" name="employee_image" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <label>Employee Gender</label>
            <select class="form-control" name="employee_gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>

        <div class="form-group col-md-12">
            <label>Employee Role</label>
            <select class="form-control" name="employee_role">
                <option>Restaurant Manager</option>
                <option>Master Chef</option>
                <option>Chef</option>
                <option>Assistant Chef</option>
                <option>Cashier</option>
                <option>Delivery Agent</option>
            </select>
        </div>

        <div class="form-group col-md-12 mt-3">
            <button type="submit" class="btn btn-primary">Add Employee</button>
        </div>
    </div>
</form>
</div>

<div class="container">
    <h1 class="p-3 border text-center my-3">All Employees</h1>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Employee Email</th>
                <th scope="col">Employee phone</th>
                <th scope="col">Employee National ID</th>
                <th scope="col">Employee Salary</th>
                <th scope="col">Employee Image</th>
                <th scope="col">Employee Gender</th>
                <th scope="col">Employee Role</th>
                <th scope="col">ِAction</th>

            </tr>
        </thead>
        <tbody>
            <tr>

                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>
                    <a class="btn btn-primary" href="#">
                        <i class="bi bi-pencil-square"></i>
                    </a>

                    <form action="">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>

            </tr>

        </tbody>
    </table>
    </div>
@endsection
