<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequests extends FormRequest {
    // Request ka use ham tab karte hai jab ham apna template page create kar rhe ho
    // yaha par ham authorize karte hai
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'name'                  => "required|min:4|max:50",
            'lname'                 => "required|min:4|max:50",
            'address'               => "required|min:4|max:255",
            'phone'                 => "required|min:10|max:12",
            'email'                 => "required|min:15|max:100|unique:admins",
            'password'              => "required|confirmed",
            'password_confirmation' => "required",

            'name.required'      => "User Name is Required",
            'lname.required'     => "User Last Name is Required",
            'address.required'   => "User Address is Required",
            'phone.required'     => "Contact Number is Required",
            'phone.required'     => "The Contact Number must be at least 10 characters (e,g 9000000000)",
            'phone.required'     => "The Contact Number must not be greater than 12 characters",
            'email.required'     => "Email is Required",
            'email.required'     => "Please Enter Valid Email like abhishek00@example.com",
            'email.existss'      => "Email already exists in database",
            'password.required'  => "Password is Required",
        ];
    }
}
