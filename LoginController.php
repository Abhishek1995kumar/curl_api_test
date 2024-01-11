<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Http\Resources\AdminResource;
use Illuminate\Support\Str;

class LoginController extends Controller {
    public function __construct() {
       try{
            $this->middleware("guest")->except("logout");
            // $this->middleware("guest:admin")->except("logout");
       }catch(\Excaption $e){
            return $e->getMessage();
       }
    }

    public function login(Request $request) {
        $rules = [
            'email'    => "required|email|exists:admins",
            'password' => "required",
        ];
        
        $customMessage = [
            'email.required' => "Email is required",
            'email.email'    => "Please enter a valid email (e.g., abhishek00@example.com)",
            'email.exists'   => "Email does not exist in the database",
            'password.required' => "Password is required",
        ];
        $validator = Validator::make($request->all(), $rules, $customMessage);
        if($validator->fails()){
            return response()->json([
                "status" => false,
                "message" => $validator->messages()
            ], 422);
        }
        if($request->isMethod("POST")){
            try{
                $input_details = $request->only(['email', 'password']);
                $login_details = Admin::where('email', $input_details['email'])->first();
                if($login_details && password_verify($input_details['password'], $login_details->password)){
                    $api_token = Str::random(100);
                    Admin::where('email', $input_details['email'])->update(['access_token' => $api_token]);
                    return response()->json([
                        'status'  => true,
                        'message' => "Admin logged in successfully",
                        'token'   => $api_token,
                    ], 201);
                }else{
                    return response()->json([
                        'status'  => false,
                        'message' => "Email or password do not match",
                    ], 422);
                }
            }catch(\Excaption $e){
                return response()->json([
                    'status'  => false,
                    'message' => $e->getMessage(),
                ], 500);
            }
        }
    }

    public function guard() {
        return Auth::guard("admin");
    }

    public function logout(Request $request) {
        try{
            $admin_token = $request->header("Authorization");
            if(empty($admin_token)){
                return response()->json([
                    'status'  => false,
                    'message' => "User Token is not found !!",
                ], 422);
            }else{
                $admin_token = str_replace("Bearer ","", $admin_token);
                $admin = Admin::where('access_token', $admin_token)->count();
                if($admin>0){
                    Admin::where('access_token', $admin_token)->update(['access_token'=>NULL]);
                    return response()->json([
                        'status'  => true,
                        'message' => 'Successfully loggod Out !!'
                    ]);
                }else{
                    
                }
            }
        }catch(\Exception $e){

        }
    }

}



