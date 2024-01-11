<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait validation {
    public static function seller_registration_validation() {
        $rules = [
            'name'                  => 'required|min:5|max:100',
            'lname'                 => 'required|min:5|max:100',
            'shop_name'             => 'required|min:20|max:255',
            'phone'                 => 'required|min:10|max:12',
            'areaandstreet'         => 'required|min:5|max:100',
            'landmark'              => 'required|min:5|max:100',
            'addressproof'          => 'required|min:5|max:100',
            'address'               => 'required|min:5|max:100',
            'email'                 => 'required|email|min:10|max:100|unique:sellers',
            'password'              => "required|min:5|confirmed",
            'password_confirmation' => "required",
        ];

        $customMessage = [
            'name.required'                 => "User Name is Required",
            'lname.required'                => "User Last Name is Required",
            'shop_name.required'            => "Vendor Shop Name is Required",
            'areaandstreet.required'        => "Vendor Street is Required",
            'landmark.required'             => "Vendor landmark is Required",
            'addressproof.required'         => "Vendor addressproof is Required",
            'address.required'              => "Vendor Address is Required",
            'phone.required'                => "Contact Number is Required",
            'phone.required'                => "The Contact Number must be at least 10 characters (e,g 9000000000)",
            'phone.required'                => "The Contact Number must not be greater than 12 characters",
            'email.required'                => "Email is Required",
            'email.required'                => "Please Enter Valid Email like abhishek00@example.com",
            'email.existss'                 => "Email already exists in database",
            'password.required'             => "Password is Required",
        ];
    }
}