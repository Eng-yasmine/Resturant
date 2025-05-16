<?php

namespace App\Http\Controllers;



use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return view('Admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login')->withErrors('You must be logged in to perform this action.');
        }
        return ($user->role == 'admin')
            ? view('Admin.employees.create', compact('users'))
            : redirect()->back()->withErrors('You do not have permission to create an employee.');

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
            ? redirect()->route('employees.index')->with('success', 'Employee created successfully')
            : redirect()->back()->withErrors('Employee creation failed');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $employee = Employee::with('user')->findOrFail($employee->id);
        return view('Admin.employees.edit', compact('employee'));
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
            ? redirect()->route('employees.index')->with('success', 'Employee updated successfully')
            : redirect()->back()->withErrors('Employee update failed');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        if (File::exists(public_path('storage/images/' . $employee->image))) {
            File::delete(public_path('storage/images/' . $employee->image));
        }

        return $employee
            ? redirect()->back()->with('success', 'Employee Deleted successfully')
            : redirect()->back()->withErrors('Employee Deleted Failed');
    }
}
