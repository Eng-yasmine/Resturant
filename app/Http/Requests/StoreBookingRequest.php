<?php

namespace App\Http\Requests;

use Closure;
use App\Models\Table;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required|date_format:H:i',
            'table_id' => 'required|exists:tables,id',
            'user_id' => 'nullable|exists:users,id',
            'status' => 'required|in:pending,confirmed,cancelled',
        ];
    }
     public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $table = Table::where('table_number', $value)->first();

        if (!$table) {
            $fail('The selected table does not exist.');
            return;
        }

        if ($table->status !== 'available') {
            $fail('The selected table is not available.');
        }
    }
}
