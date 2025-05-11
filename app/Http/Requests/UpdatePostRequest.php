<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
        public function messages(): array
{
    return [
        'title.required' => 'The post title is required.',
        'title.string' => 'The post title must be a string.',
        'title.max' => 'The post title may not be greater than 255 characters.',
        'content.required' => 'The post content is required.',
        'content.string' => 'The post content must be a string.',
        'content.max' => 'The post content may not be greater than 1000 characters.',
        'image.image' => 'The post image must be an image.',
        'image.mimes' => 'The post image must be a file of type: jpeg, png, jpg, gif.',
        'image.max' => 'The post image may not be greater than 2048 kilobytes.',
        'user_id.required' => 'The User field is required.',
        'user_id.exists' => 'This User is invalid.',

    ];
}
}
