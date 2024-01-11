<?php

namespace App\Http\Controllers\Admins\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\AdminResource;
use Illuminate\Support\Str;

class LoginController extends Controller {
    use AuthenticatesUsers;
    // public function __construct() {
    //    try{
    //         $this->middleware("guest")->except("logout");
    //         $this->middleware("guest:admin")->except("logout");
    //    }catch(\Excaption $e){
    //         return $e->getMessage();
    //    }
    // }

    // public function loginForm(){
    //     return view();
    // }

    // public function login(Request $request) {
    //     $rules = [
    //         "email" => "required|email",
    //         "password" => "required|confirmed",
    //     ];
    //     $validator = Validator::make($request->all(), $rules);
    //     if($validator->fails()){
    //         return response()->json([
    //             "status" => true,
    //             "message" => $validator . " Failed login !!"
    //         ]);
    //     }
    //     try{
    //         if(Auth::guard('admin')){
                
    //         }
    //     }catch(\Excaption $e){
    //         return $e->getMessage();
    //     }
    // }

    // public function guard() {
    //     return Auth::guard("admin");
    // }

    // public function store(Request $request) {
    //     //
    // }


    public function __construct() {
        try{
            $this->middleware("guest")->except("logout");
            $this->middleware("guest:admin")->except("logout");
        }catch(\Exception $e){
            return response()->json([
                'status'  => false,
                'message' => $e->getMessage(),
            ], 422);
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
        if(Auth::guard("admin")){
            if($request->isMethod("POST")){
                try{ 
                     $data = Admin::all();
                    if($data[0]['status'] == 1 && $data[0]['login_status'] == 2){
                        $input_details = $request->only(['email', 'password']);
                        $login_details = Admin::where('email', $input_details['email'])->first();
                        if($login_details && password_verify($input_details['password'], $login_details->password)){
                            $api_token = Str::random(100);
                            $status = Admin::where('email', $input_details['email'])->update(['status' => 1, 'login_status'=>1]);
                            Admin::where('email', $input_details['email'])->update(['access_token' => $api_token]);
                            foreach($login_details as $key => $log){
                                if($login_details->role == 1){
                                    return response()->json([
                                        'status'  => true . $status,
                                        'message' => "Super Admin logged in successfully",
                                        'token'   => $api_token,
                                    ], 201);
                                }elseif($login_details->role == 2){
                                    return response()->json([
                                        'status'  => true . $status,
                                        'message' => "Admin logged in successfully",
                                        'token'   => $api_token,
                                    ], 201);
                                } elseif ($login_details->role == 3){
                                    return response()->json([
                                        'status'  => true . $status,
                                        'message' => "Order Admin logged in successfully" ,
                                        'token'   => $api_token,
                                    ], 201);
                                } elseif($login_details->role == 4){
                                    return response()->json([
                                        'status'  => true . $status,
                                        'message' => "Data Entry logged in successfully" ,
                                        'token'   => $api_token,
                                    ], 201);
                                } elseif($login_details->role == 5){
                                    return response()->json([
                                        'status'  => true . $status,
                                        'message' => "Groccesory logged in successfully",
                                        'token'   => $api_token,
                                    ], 201);
                                } elseif($login_details->role == 6){
                                    return response()->json([
                                        'status'  => true . $status,
                                        'message' => "Medical logged in successfully",
                                        'token'   => $api_token,
                                    ], 201);
                                } elseif($login_details->role == 7){
                                    return response()->json([
                                        'status'  => true . $status,
                                        'message' => "Markerting logged in successfully",
                                        'token'   => $api_token,
                                    ], 201);
                                } elseif($login_details->role == 8){
                                    return response()->json([
                                        'status'  => true . $status,
                                        'message' => "Operational logged in successfully",
                                        'token'   => $api_token,
                                    ], 201);
                                } elseif($login_details->role == 9){
                                    return response()->json([
                                        'status'  => true . $status,
                                        'message' => "Accounting logged in successfully",
                                        'token'   => $api_token,
                                    ], 201);
                                }elseif($login_details->role == 10){
                                    return response()->json([
                                        'status'  => true . $status,
                                        'message' => "Research logged in successfully",
                                        'token'   => $api_token,
                                    ], 201);
                                }else{
                                    return response()->json([
                                        'status'  => true . $status,
                                        'message' => "Production logged in successfully",
                                        'token'   => $api_token,
                                    ], 201);
                                }
                                return false;
                            }
                        }else{
                            return response()->json([
                                'status'  => false,
                                'message' => "Email or password do not match",
                            ], 422);
                        }
                    }else{
                        return response()->json([
                            'status'  => false,
                            'message' => "please contact admin person to activate your account !!",
                        ], 401);
                    }
                }catch(\Exception $e){
                    return response()->json([
                        'status'  => false,
                        'message' => $e->getMessage(),
                    ], 500);
                }
            }
        }
    }

    public function logout(Request $request) {
        if(Auth::guard('admin')){
            try{
                $data = Admin::all();
                if($data[0]['status'] == 1 && $data[0]['login_status'] == 1){
                    $admin_token = $request->header("Authorization");
                    if(empty($admin_token)){
                        return response()->json([
                            'status'  => false,
                            'message' => "User Token is not found !!",
                        ], 422);
                    } else{
                        $admin_token = str_replace("Bearer ", "", $admin_token);
                        $admin = Admin::where('access_token', $admin_token)->count();
                        if($admin>0){
                            $data = Admin::where('access_token', $admin_token)->update(['access_token'=>NULL, 'login_status'=> 2]);
                            return response()->json([
                                'status'  => true,
                                'message' => 'Successfully loggod Out !!'
                            ], 200);
                        }else{
                            
                        }
                    }
                }else{
                    return response()->json([
                        'status'  => false,
                        'message' => 'Please try again !!'
                    ], 500);
                }
            }catch(\Exception $e){
                return response()->json([
                    'status'  => false,
                    'message' => $e->getMessage()
                ], 422);
            } 
        }else{
            return response()->json([
                'status'=> false,
                'message'=> "you are not admin user !!",
            ]);
        }
    }
}



