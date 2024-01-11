<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash ;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Http\Resources\AdminResource;
use Auth;

class RegistrationController extends Controller {
    public function index(Request $request) {
        $header = $request->header("Authorization");
        if(empty($header)){
            return response()->json([
                'status' => false, 
                'message' => "Authorization Is Missing !!",
            ], 422);
        }else{
            if($header == "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI5NDE1MDU4MjA5IiwibmFtZSI6IlNob3BwaW5nIiwiaWF0IjoyMjEyMjAyM30.eS2_ecqt1OEH0_0HFfqn7iPys4Zl4zc1Q8SWbgiZGLU"){
                try{
                    $data = Admin::where('status', '3')->get();
                    if($data){
                        return response()->json([
                            'status' => true, // status always true or false set whenever we use api
                            'data' => AdminResource::collection($data),
                        ], 200);
                    }else{
                        return response()->json([
                            'status' => false,
                            'message' => "Data not Found",
                        ], 404);
                    }
                }catch (\Exception $e){
                    return $e->getMessage();
                }
            }else{
                return response()->json([
                    'status' => false,
                    'message' => "Authorization Is Incorrect !!",
                ], 404);
            }
        }
    }

    public function store(Request $request) {
        $rules = [
            'name'                  => "required|min:4|max:50",
            'lname'                 => "required|min:4|max:50",
            'address'               => "required|min:4|max:255",
            'phone'                 => "required|min:10|max:12",
            'email'                 => "required|min:15|max:100|unique:admins",
            'password'              => "required|confirmed",
            'password_confirmation' => "required",
        ];

        $customMessage = [
            'name.required'      => "User Name is Required",
            'lname.required'     => "User Last Name is Required",
            'address.required'   => "User Address is Required",
            'phone.required'     => "Contact Number is Required",
            'phone.required'     => "The Contact Number must be at least 10 characters (e,g 9000000000)",
            'phone.required'     => "The Contact Number must not be greater than 12 characters",
            'email.required'     => "Email is Required",
            'email.required'     => "Please Enter Valid Email like abhishek00@example.com",
            'email.existss'     => "Email already exists in database",
            'password.required'  => "Password is Required",
        ];

        $validated = Validator::make($request->all(), $rules, $customMessage);
        if($validated->fails()){
            return response()->json($validated->messages(), 422);
        }else{
            if($request->isMethod('POST')){
                try{
                    $value = $request->input();
                    $api_token = Str::random(100);
                    $data                 = new Admin();
                    $data->name           = $request->name;
                    $data->lname          = $request->lname;
                    $data->phone          = $request->phone;
                    $data->address        = $request->address;
                    $data->email          = $request->email;
                    $data->password       = Hash::make($request->password);
                    $data->access_token   = $api_token;
                    $data->save();
                    if(Auth::attempt(['email'=>$value['email'], 'password'=>$value['password']])){
                        $user = Admin::where(['email' => $value['email']])->first();
                        $token = $user->createToken($value['email'])->accessToken();
                        $user = Admin::where('email', $value['email'])->update(['access_token' => $token]);
                        return response()->json([
                            'status'  => true,
                            'message' => $data->id . " Admin Create Successfully !!",
                            'token'   => $data->access_token
                        ], 200);
                    }else{
                        return response()->json([
                            'status'  => false,
                            'message' => " Something went wrong ! please try to again !!"
                        ], 422);
                    }

                }catch (\Exception $e) {
                    return $e->getMessage();
                }
            }else{
                return response()->json([
                    'status' => true,
                    'message' => "Invalid or Expired Authorization Token !!"
                ], 498);
            }
        };
    }

    public function delete($id) {
        $header = $request->header("Authorization");
        if(empty($header)){
            return response()->json([
                'status' => false, 
                'message' => "Authorization Is Missing !!",
            ], 422);
        }else{
            if($header == "Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiI5NDE1MDU4MjA5IiwibmFtZSI6IlNob3BwaW5nIiwiaWF0IjoyMjEyMjAyM30.eS2_ecqt1OEH0_0HFfqn7iPys4Zl4zc1Q8SWbgiZGLU"){
                try{
                    $admin_user = Admin::find($id);
                    if(!is_null($admin_user)){
                        $admin = $admin_user->delete();
                        return response()->json([
                                'status' => true,
                                'message' => $admin . " Record Delete Successfully !!",
                            ], 200);
                    }else{
                        return response()->json([
                            'status' => false,
                            'message' => "Data not Found !!",
                        ], 404);
                    }
                }catch (\Exception $e){
                    return $e->getMessage();
                }
            }else{
                return response()->json([
                    'status' => false,
                    'message' => "Authorization Is Incorrect !!",
                ], 422);
            }
        }
    }

    public function restore($id){
        try{
            $admin_user = Admin::withTrashed()->find($id);
            if(!is_null($admin_user)){
                $admin = $admin_user->restore();
                return response()->json([
                    'status' => true,
                    'message' => " Record recover Successfully !!",
                ], 201);
            }else{
                return response()->json([
                    'status' => true,
                    'message' => "Record not found !!",
                ], 404);
            }
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function status($id){
        try{
            $getStatus = Admin::find($id);
            if($getStatus->status == "3"){
                $getStatus->status = "1";;
            }elseif($getStatus->status == "1"){
                $getStatus->status = "2";
            }elseif($getStatus->status == "2"){
                $getStatus->status = "4";
            }else{
                $getStatus->status = "3";
            }
            $getStatus->update();
            return response()->json([
                'status' => true,
                'message' => " Status updated Successfully !!",
            ]);
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}

