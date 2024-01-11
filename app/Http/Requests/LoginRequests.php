<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequests extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
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
            'email'    => "required|email|exists:admins",
            'password' => "required",

            'email.required' => "Email is required",
            'email.email'    => "Please enter a valid email (e.g., abhishek00@example.com)",
            'email.exists'   => "Email does not exist in the database",
            'password.required' => "Password is required",
        ];
    }
}
