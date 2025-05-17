<?php

namespace App\Http\Controllers\Apis\Employees;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Resources\EmployeeResource;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Controllers\Apis\Traits\ApiResponseTrait;

class EmployeeController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('user')->latest()->paginate(10);
        return $employees
            ? $this->successResponse(EmployeeResource::collection($employees), 'Employees retrieved successfully', 200)
            : $this->errorResponse('No employees found', 404);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->check() ? auth()->id() : null;
        // Set the user_id to the authenticated user's ID

        $imageName = "default.jpeg"; // Initialize the imageName

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/storage/images'), $imageName);

        }

        $validatedData['image'] = $imageName; // Only assign if the image was uploaded
        $employee = Employee::create($validatedData);

        return $employee
        ? $this->successResponse(new EmployeeResource($employee), 'Employee created successfully', 201)
        : $this->errorResponse('Failed to create employee', 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id(); // Set the user_id to the authenticated user's ID

        if ($request->hasFile('image')) {
            if (File::exists(public_path('storage/images/' . $employee->image))) {
                File::delete(public_path('storage/images/' . $employee->image));
            }
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('/storage/images'), $imageName);
            $validatedData['image'] = $imageName;
        }

        $employee->update($validatedData);

        return $employee
            ? $this->successResponse(new EmployeeResource($employee), 'Employee updated successfully', 200)
            : $this->errorResponse('Failed to update employee', 400);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return $employee
            ? $this->successResponse(new EmployeeResource($employee), 'Employee deleted successfully', 200)
            : $this->errorResponse('Failed to delete employee', 400);
    }
    // public function search(Request $request)
    // {
    //     $query = $request->input('query');
    //     $employees = Employee::where('name', 'LIKE', "%{$query}%")
    //         ->orWhere('email', 'LIKE', "%{$query}%")
    //         ->orWhere('phone', 'LIKE', "%{$query}%")
    //         ->with('user')
    //         ->latest()
    //         ->paginate(10);

    //     return $employees
    //       ? $this->successResponse(EmployeeResource::collection($employees), 'Employees retrieved successfully', 200)
    //         : $this->errorResponse('No employees found', 404);
    // }
}
