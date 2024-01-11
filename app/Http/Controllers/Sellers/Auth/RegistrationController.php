<?php

namespace App\Http\Controllers\Sellers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash ;
use App\Models\Seller;
use Illuminate\Support\Str;
use Auth;
use App\Traits\validation;
use App\Http\Resources\SellerRegisterResource;
class RegistrationController extends Controller {
    use validation;

    public function __construct() {
        
    }

    public function index(Request $request) {
        $header = $request->header("Authorization");
        try{
            if(empty($header)){
                return response()->json([
                    'status' => false, 
                    'message' => "Authorization Is Missing !!",
                ], 422);
            }
            $seller = Seller::where('status',1)->get();
            if($seller){
                return response()->json([
                    "status"=> true,
                    "message" => "Successfully getting data !!",
                    "Seller"=>  SellerRegisterResource::collection($seller),
                ],201);
            }else{
                return response()->json([
                    'status' => false,
                    'message' => "Data not Found",
                ], 404);
            }
        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                "message"=> $e->getMessage()
            ], 498);
        }
    }

    public function registration(Request $request) {
        $rules = [
            'name'                  => 'required|min:5|max:50',
            'lname'                 => 'required|min:5|max:50',
            'shop_name'             => 'required|min:5|max:255',
            // 'phone'                 => 'required|min:5|max:12',
            'phone'                 => 'required|min:5',
            'areaandstreet'         => 'required|min:5|max:100',
            'landmark'              => 'required|min:5|max:100',
            'addressproof'          => 'required|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
            'address'               => 'required|min:5|max:255',
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
            'address.required'              => "Vendor Address is Required",
            'phone.required'                => "Contact Number is Required",
            'phone.required'                => "The Contact Number must be at least 10 characters (e,g 9000000000)",
            'phone.required'                => "The Contact Number must not be greater than 12 characters",
            'email.required'                => "Email is Required",
            'email.required'                => "Please Enter Valid Email like abhishek00@example.com",
            'email.existss'                 => "Email already exists in database",
            'password.required'             => "Password is Required",
        ];
        $validator = Validator::make($request->all(), $rules, $customMessage);
        if( $validator->fails() ) {
            return response([
                "message"=> $validator->messages(),
            ], 422);
        }
        try{
            if($request->isMethod("POST")){
                $data = [
                    "name"              => $request->has("name") ? secure($request->name, 'E') : NULL,
                    "lname"             => $request->has("lname") ? secure($request->lname, 'E') : NULL,
                    "areaandstreet"     => $request->has("areaandstreet") ? secure($request->areaandstreet, 'E') : NULL,
                    "landmark"          => $request->has("landmark") ? secure($request->landmark, 'E') : NULL,
                    "address"           => $request->has("address") ? secure($request->address, 'E') : NULL,
                    "phone"             => $request->has("phone") ? secure($request->phone, 'E') : NULL,
                    "shop_name"         => $request->shop_name,
                    "email"             => $request->email,
                    "password"          => Hash::make($request->password),
                ];
                $api_token = Str::random(100);
                $seller = new Seller();
                $seller->name               = $data['name'];
                $seller->lname              = $data['lname'];
                $seller->areaandstreet      = $data['areaandstreet'];
                $seller->address            = $data['address'];
                $seller->phone              = $data['phone'];
                $seller->password           = $data['password'];
                $seller->shop_name          = $request->shop_name;
                $seller->landmark           = $request->landmark;
                $seller->email              = $request->email;
                $seller->gender             = $request->gender;
                $seller->fax                = $request->fax;
                $seller->city               = $request->city;
                $seller->state              = $request->state;
                $seller->country            = $request->country;
                $seller->bussiness_name     = $request->bussiness_name;
                $seller->bank_name          = $request->bank_name;
                $seller->account_no         = $request->account_no ? $request->account_no : "NULL";
                $seller->ifsc_code          = $request->ifsc_code;
                $seller->gst_no             = $request->gst_no;
                $seller->id_proof           = $request->id_proof;
                $seller->shop_act_lic       = $request->shop_act_lic;
                $seller->udyam_cert         = $request->udyam_cert;
                $seller->pincode            = $request->pincode;
                $seller->current_balance    = $request->current_balance;
                $seller->id_proof           = $request->id_proof;
                $seller->access_token       = $api_token;
                if($seller->name != NULL && $seller->lname != NULL){
                    $seller->username = $seller->name . ' ' . $seller->lname;
                }
                if($request->has('id_proof')){
                    $imageName = $request->file('id_proof');
                    $extention = $imageName->getClientOriginalExtension();
                    $filename = time() .'.'. $extention;
                    $imageName->move(('uploads/id_proof'), $filename);
                    $seller->id_proof = secure($filename, 'E');
                }
                if($request->has('addressproof')){
                    $imageName = $request->file('addressproof');
                    $extention = $imageName->getClientOriginalExtension();
                    $filename = time() .'.'. $extention;
                    $imageName->move(('uploads/addressproof'), $filename);
                    $seller->addressproof = secure($filename, 'E');
                }
                if($request->has('aadhar_card')){ 
                    $imageName = $request->file('aadhar_card');
                    $extention = $imageName->getClientOriginalExtension();
                    $filename = time() .'.'. $extention;
                    $imageName->move(('uploads/aadhar_card'), $filename);
                    $seller->aadhar_card = secure($filename, 'E');
                }
                if(!is_null($seller)){
                    $seller->save();
                    $last_seller_id = $seller->id;
                    return response()->json([
                        'status'  => true,
                        'Seller Id'  => $last_seller_id,
                        'message' => " Seller Create Successfully !!",
                        'token'   => $seller->access_token
                    ], 200);
                }

                if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']])) {
                    $seller = Seller::where('email', $data['email'])->first();
                    $token = $seller->createToken($data['password'])->accessToken();
                    $seller = Seller::where('email', $data['email'])->update(['access_token'=>$token]);
                    return response()->json([
                        'status'  => true,
                        'message' => $seller->id . " Seller Token Updated Successfully !!",
                        'token'   => $seller->access_token
                    ], 200);
                }else{
                    return response()->json([
                        'status'  => false,
                        'message' => " Something went wrong ! please try to again !!"
                    ], 422);
                }
            }
        }catch(\Exception $e ) {
            return response([
                "status"=> true,
                "message"=> $e->getMessage(),
            ]);
        }
    }

    
    public function delete(Request $request, $id) {
        $header = $request->header("Authorization");
        if(empty($header)){
            return response()->json([
                'status' => false, 
                'message' => "Authorization Is Missing !!",
            ], 422);
        }else{
            if($header){
                try{
                    $seller = Seller::find($id);
                    if(!is_null($seller)){
                        $seller_delete = $seller->delete();
                        return response()->json([
                                'status' => true,
                                'message' => $seller_delete . " Seller Record successfully deleted  !!",
                            ], 200);
                    }else{
                        return response()->json([
                            'status' => false,
                            'message' => "Seller id not found !!",
                        ], 404);
                    }
                }catch (\Exception $e){
                    return $e->getMessage();
                }
            }else{
                return response()->json([
                    'status' => false,
                    'message' => "Token not found !!",
                ], 422);
            }
        }
    }

    public function status(Request $request){
        try{
            $getStatus = Seller::where('id', $request->id)->first();
            switch ($getStatus) {
                case $getStatus->status == "3":
                    $getStatus->status = "1";
                    break;
                case $getStatus->status == "1":
                    $getStatus->status = "2";
                    break;
                case $getStatus->status == "2":
                    $getStatus->status = "4";
                    break;
                default:
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


