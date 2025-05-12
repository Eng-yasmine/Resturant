<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:employees,email',
            'phone' => 'required|string|max:20',
            'position' => 'required|in:chef,assistant_chef,master_chef,cashier,waiter,manager,security,cleaner,supervisor,delivery,receptionist,accountant,restaurant_manager',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'start_date' => 'required|date',
            'salary' => 'required|numeric|min:0',
            'gender' => 'required|in:female,male',
            'national_ID' => 'required|string|max:20',
            'user_id' => 'required|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Employee Name is required',
            'email.required' => 'Employee Email is required',
            'phone.required' => 'Employee Phone number is required',
            'position.required' => 'Employee Position is required',
            'salary.required' => 'Employee Salary is required',
            'national_ID.required' => 'Employee National ID is required',
            'password.required' => 'Employee Password is required',
            'user_id.required' => 'User ID is required',
            'image.image' => 'The file must be an image',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif',
            'image.max' => 'The image may not be greater than 2MB',
            'email.unique' => 'The email has already been taken',
        ];
    }
}
