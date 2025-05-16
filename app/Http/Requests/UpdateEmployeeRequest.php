<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user_id)],
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'position' => 'required|in:chef,assistant_chef,master_chef,cashier,waiter,manager,security,cleaner,supervisor,delivery,receptionist,accountant,restaurant_manager',
            'salary' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image validation
            'date_of_birth' => 'required|date',
            'start_date' => 'required|date',
            'national_ID' => 'required|string|max:20',
            // 'user_id' => 'required|exists:users,id',
            'gender' => 'required|in:female,male',
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
            'image.image' => 'The file must be an image',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif',
            'image.max' => 'The image may not be greater than 2MB',
            'email.unique' => 'The email has already been taken',
        ];
    }
}
