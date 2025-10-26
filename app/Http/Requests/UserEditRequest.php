<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'status' => 'required|in:active,banned',
            'permissions' => 'array',
            'permissions.*' => 'in:post,comment',
        ];
    }

    public function messages(): array
    {
        return [
            'fname.required' => 'First name is required.',
            'lname.required' => 'Last name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please provide a valid email address.',
            'status.required' => 'Status is required.',
            'status.in' => 'Status must be either active or banned.',
            'permissions.array' => 'Permissions must be an array.',
            'permissions.*.in' => 'Invalid permission selected.',
        ];
    }
}
