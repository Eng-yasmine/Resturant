<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreContactRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email:filter|email',
            'subject' => 'required|string|max:150|min:10',
            'message' => 'required|string|max:255|min:20',
            'contact_type' => 'required|in:Booking,Technical,General',

        ];
    }

    public function messages()
    {
        return [
            'contact_type.required' => 'Please select a contact type.',
            'contact_type.in' => 'The contact type must be one of the following: Booking, Technical, General.',
        ];
    }
}
